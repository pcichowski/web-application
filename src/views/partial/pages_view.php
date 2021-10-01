<div class="pages">
    <div class="pages-div">
    <a href="previous_page" style="color:white;">Poprzednia</a>
    <ul>
        <?php for ($i=0; $i < $pages['number_of_pages']; $i++): ?>
            <?php if( $i == $pages['page']): ?>
                <li style="font-size: 30px; font-weight: bold;"> <?= ($i + 1) ?></li>
            <?php else: ?>
                <li> <?= ($i + 1) ?></li>
            <?php endif ?>
        <?php endfor?>
    </ul>
    <a href="next_page" style="color:white;">Następna</a>
    </div>
</div>