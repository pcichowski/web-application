<div id="content-gallery">
    <?php if (count($images)): ?>
        <?php foreach ($images  as $iterator => $image): ?>
            <?php if($iterator >= $_SESSION['page'] * 5 && $iterator < ($_SESSION['page'] * 5 + 5)): ?>
                <div class="box-gallery">
            <div class="box-text">
                <?php if ($image['title'] == null){?>
                    <h2>
                        <?= ($iterator + 1) . ". Brak tytułu" ?>
                    </h2>
                <?php }else{ ?>
                <h2>
                    <?= ($iterator + 1) . ". " . $image['title'] ?>
                </h2>
                <?php }?>
                <p>
                    <?= $image['description'] ?>
                </p>
                <p>Autor: <?= $image['author'] ?></p>
                <?php if(!empty($_SESSION['login'])): ?>
                    <?php if ($_SESSION['login'] == 'admin'): ?>
                    <a href="delete_image?id=<?= $image['_id']?>">Usuń zdjęcie</a>
                    <?php endif ?>
                <?php endif ?>
            </div>
            <div class="box-img" style="background-image: url(<?="images/thumbnails/thumbnail_" . $image['plik']['name'] . "\""?> )" title="Link"><a href="<?= "images/watermarked/w_" . $image['plik']['name'] ?>"></a></div>
            <!--
            <div class="gallery-check">
                <input type="checkbox" name="check" class="chbox" onclick="save()"/>
                <p>Przeczytałem/am</p>
            </div>-->
            </div>   
            <?php endif ?>
        <?php endforeach?>
    <?php else: ?>
        <p>Brack zdjec :(</p>
    <?php endif ?>
</div>