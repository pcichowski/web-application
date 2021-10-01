<!DOCTYPE html>
<html>
<head>
    <title>Usuwanie zdjecia</title>
    <link rel="stylesheet" href="static/css/styles.css"/>
</head>
<body>

<form method="post">
    Czy usunąć zdjecie: <?= $image['title'] ?>?

    <input type="hidden" name="id" value="<?= $image['_id'] ?>">

    <div>
        <a href="gallery" class="cancel">Anuluj</a>
        <input type="submit" value="Potwierdź"/>
    </div>
</form>

</body>
</html>
