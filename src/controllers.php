<?php
require_once 'business.php';
require_once 'controller_utils.php';

define('NUM_OF_IMAGES_PER_PAGE', 5);

function images(&$model){

    $images = get_images();
    $model['images'] = $images;

    echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

    if(!isset($_SESSION['page'])){
        $_SESSION['page'] = 0;
        $_SESSION['number_of_pages'] = ceil(count($images) / NUM_OF_IMAGES_PER_PAGE);
    }

    return 'partial/images_view';
}

function pages(&$model){
    if(!isset($_SESSION['page']) || !isset($_SESSION['number_of_pages'])){
        $_SESSION['page'] = 0;
        $_SESSION['number_of_pages'] = ceil(count($images) / NUM_OF_IMAGES_PER_PAGE);
    }
    $pages = [
        'page' => $_SESSION['page'],
        'number_of_pages' => $_SESSION['number_of_pages']
    ];

    $model['pages'] = $pages;

    return 'partial/pages_view';
}

function next_page(){
    $page_num = $_SESSION['page'];
    $limit = $_SESSION['number_of_pages'];
    if($page_num == ($limit - 1)){
        return 'redirect:gallery';
    }else{
        $_SESSION['page'] = ($page_num + 1);
        return 'redirect:gallery';
    }
}

function previous_page(){
    $page_num = $_SESSION['page'];
    if($page_num == 0){
        return 'redirect:gallery';
    }else{
        $_SESSION['page'] = ($page_num - 1);
        return 'redirect:gallery';
    }
}

function products(&$model)
{
    $products = get_products();
    $model['products'] = $products;

    return 'products_view';
}

function product(&$model)
{
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        if ($product = get_product($id)) {
            $model['product'] = $product;
            return 'product_view';
        }
    }

    http_response_code(404);
    exit;
}

function add_image(&$model){

    $upload_dir = '../images';

    $image = [
        'title' => null,
        'description' => null,
        'author' => null,
        'plik' => null,
        '_id' => null
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!empty($_POST['title'])) {
            define ('SITE_ROOT', realpath(dirname(__FILE__)));
            $id = isset($_POST['id']) ? $_POST['id'] : null;

            $upload_dir = '/web/images/';

            if($_SESSION['zalogowano'] == 1){
                $image = [
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'author' => $_SESSION['login'],
                    'plik' => $_FILES['zdjecie']
                ];
            }else{
                $image = [
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'author' => 'Niezalogowany użytkownik',
                    'plik' => $_FILES['zdjecie']
                ];
            }

            $watermark_added_text = $_POST['watermark'];

            $file = $image['plik'];
            $file_name = str_replace(' ','_', basename($file['name']));
            $image['plik']['name'] = $file_name;
            $target = SITE_ROOT . $upload_dir . $file_name;
            $tmp_path = $file['tmp_name'];
            $plik_info = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($plik_info, $tmp_path);
            $file_size_kb = $file['size']/1024;
            if($file_size_kb > 1024){
                echo("Za duży rozmiar pliku, limit <= 1 MB"); 
            }
            if(($mime_type === 'image/png' || $mime_type === 'image/jpeg') && $file_size_kb <= 1024){
                if(move_uploaded_file($tmp_path, $target)){
                    resize_image($target, 200, 125, $file_name, $mime_type);
                    image_add_watermark($target, $file_name, $watermark_added_text, $mime_type);
    
                    $dest = SITE_ROOT . $upload_dir . 'thumbnails/' . $file_name;
                    //move_uploaded_file($target, $dest);
                    //rename('thumbnail_' . $file_name, );
                }
    
                if (save_image($id, $image)) {
                    //return 'redirect:gallery';
                }
                return 'redirect:gallery';
            }else if(($mime_type !== 'image/png' || $mime_type !== 'image/jpeg') && $file_size_kb > 1024){
                echo '<script type="text/javascript">
                window.onload = function () { alert("Niepoprawne rozszerzenie pliku i rozmiar pliku nie może być większy niż 1 MB"); }
                </script>';
            }else if(($mime_type !== 'image/png' || $mime_type !== 'image/jpeg')){
                echo '<script type="text/javascript">
                window.onload = function () { alert("Niepoprawne rozszerzenie pliku); }
                </script>';
            }else{
                echo '<script type="text/javascript">
                window.onload = function () { alert("Rozmiar pliku nie może być większy niż 1MB); }
                </script>';
            }
        }
    } elseif (!empty($_GET['id'])) {
        $image = get_image($_GET['id']);
    }

    $images = get_images();

    $model['image'] = $image; 

    return 'add_image_view';
}



function delete_image(&$model){
    if (!empty($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = get_image($id);
            $path = '/var/www/dev/src/web/images/' . $image['plik']['name'];
            $path_thumb = '/var/www/dev/src/web/images/thumbnails/thumbnail_' . $image['plik']['name'];
            $path_watermarked = '/var/www/dev/src/web/images/watermarked/w_' . $image['plik']['name'];
            unlink($path);
            unlink($path_thumb);
            delete_selected_image($id);
            return 'redirect:gallery';

        } else {
            if ($image = get_image($id)) {
                $model['image'] = $image;
                return 'delete_image_view';
            }
        }
    }

    http_response_code(404);
    exit;
}

function register(&$model){
    $user = [
        'login' => null,
        'password' => null,
        'email' => null,
        '_id' => null
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['login']) && !empty($_POST['password'])){
            $id = isset($_POST['id']) ? $_POST['id'] : null;

            if((string)$_POST['password'] == (string)$_POST['repeat_password']){
                $user = [
                    'login' => (string)$_POST['login'],
                    'password' => password_hash((string)$_POST['password'], PASSWORD_DEFAULT),
                    'email' => (string)$_POST['email']
                ];
            }

            if(!empty(get_user_by_login($user['login']))){
                echo '<script type="text/javascript">
                    window.onload = function () { alert("Taki użytkownik już istnieje"); }
                    </script>';
                return 'register_view';
            }

            if (add_user($id, $user)) {
                return 'redirect:gallery';
            }
        }
    } elseif (!empty($_GET['id'])) {
        $user = get_user($_GET['id']);
    }

    $model['register'] = $user;

    return 'register_view';
}

function login_status(&$model){
    $login_data = [
        'login' => null,
        'password' => null,
        '_id' => null
    ];
    ob_start();
    $_SESSION['zalogowano'] = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['login']) && !empty($_POST['password'])){
            $id = isset($_POST['id']) ? $_POST['id'] : null;

            $login_data = [
                'login' => (string)$_POST['login'],
                'password' => (string)$_POST['password']
            ]; 

            $user = get_user_by_login($login_data['login']);
            if($user != null && password_verify($login_data['password'], $user['password'])){
                $_SESSION['user_id'] = $user['_id'];
                $_SESSION['login'] = $user['login'];
                $_SESSION['zalogowano'] = true;
            }else{
                echo '<script type="text/javascript">
                    window.onload = function () { alert("Niepoprawne hasło"); }
                    </script>';
                //echo("Hasło niepoprawne");
            }
        }
    } elseif (!empty($_GET['id'])) {
        $user = get_user($_GET['id']);
    }

    if(!empty($_SESSION['login'])){
        $logged_user = get_user_by_login($_SESSION['login']);
    }else{
        $logged_user['login'] = null;
    }

    $model['logged_user'] = $logged_user;

    return 'partial/login_status_view';
}

function log_out(){

    unset($_SESSION['user_id']);
    unset($_SESSION['login']);

    return 'redirect:gallery';
}

function edit(&$model)
{
    $product = [
        'name' => null,
        'price' => null,
        'description' => null,
        '_id' => null
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['name']) &&
            !empty($_POST['price']) /* && ...*/
        ) {
            $id = isset($_POST['id']) ? $_POST['id'] : null;

            $product = [
                'name' => $_POST['name'],
                'price' => (int)$_POST['price'],
                'description' => $_POST['description']
            ];

            if (save_product($id, $product)) {
                return 'redirect:products';
            }
        }
    } elseif (!empty($_GET['id'])) {
        $product = get_product($_GET['id']);
    }

    $model['product'] = $product;

    return 'edit_view';
}

function delete(&$model)
{
    if (!empty($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            delete_product($id);
            return 'redirect:products';

        } else {
            if ($product = get_product($id)) {
                $model['product'] = $product;
                return 'delete_view';
            }
        }
    }

    http_response_code(404);
    exit;
}

function cart(&$model)
{
    $model['cart'] = get_cart();
    return 'partial/cart_view';
}

function add_to_cart()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];
        $product = get_product($id);

        $cart = &get_cart();
        $amount = isset($cart[$id]) ? $cart[$id]['amount'] + 1 : 1;

        $cart[$id] = ['name' => $product['name'], 'amount' => $amount];

        return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }
}

function clear_cart()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['cart'] = [];
        return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }
}

function index(){
    return 'index_view';
}

function gallery(){
    return 'gallery_view';
}

function contact(){
    return 'contact_view';
}