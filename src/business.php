<?php

use MongoDB\BSON\ObjectID;

function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}

function get_images(){
    $db = get_db();
    return $db->images->find()->toArray();
}

function get_image($id){
    $db = get_db();
    return $db->images->findOne(['_id' => new ObjectID($id)]);
}

function get_image_name($id){
    $db = get_db();
    return $db->images->findOne(['_id' => new ObjectID($id)])['title'];
}

function save_image($id, $image){
    $db = get_db();

    if($id == null){
        $db->images->insertOne($image);
    }else{
        $db->images->replaceOne(['_id' => new ObjectID($id)], $image);
    }

    return true;
}

function delete_selected_image($id){
    $db = get_db();
    $db->images->deleteOne(['_id' => new ObjectID($id)]);
}

function add_user($id, $user){
    $db = get_db();
    if($id == null){
        $db->users->insertOne($user);
    }else{
        $db->users->replaceOne(['_id' => new ObjectID($id)], $user);
    }
    return true;
}

function get_user($id){
    $db = get_db();
    return $db->users->findOne(['_id' => new ObjectID($id)], $user);
}

function get_user_by_login($login){
    $db = get_db();
    return $db->users->findOne(['login' => $login]);
}

function get_products()
{
    $db = get_db();
    return $db->products->find()->toArray();
}

function get_products_by_category($cat)
{
    $db = get_db();
    $products = $db->products->find(['cat' => $cat]);
    return $products;
}

function get_product($id)
{
    $db = get_db();
    return $db->products->findOne(['_id' => new ObjectID($id)]);
}

function save_product($id, $product)
{
    $db = get_db();

    if ($id == null) {
        $db->products->insertOne($product);
    } else {
        $db->products->replaceOne(['_id' => new ObjectID($id)], $product);
    }

    return true;
}

function delete_product($id)
{
    $db = get_db();
    $db->products->deleteOne(['_id' => new ObjectID($id)]);
}
