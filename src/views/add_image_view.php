<!DOCTYPE html>
<html>
    <head>
        <title>Dodaj zdjecie</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>
    <body>
        <div class="small_header" style="height: 100px;">
            <div class="headerblock">
                <div class="naglowek"><h7>Dodaj zdjęcie</h7></div>
            </div>
        </div>
        <div class="formularz">
            <form method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-add">
                    <label>
                        <p>Tytuł</p>
                        <input type="text" name="title" style="padding: 5px;" required>
                    </label>
                </div>
                <div id="textboxdiv-add">
                    <p>Opis obrazka</p>
                    <textarea name="description" class="textbox" rows="1" cols="5"></textarea>
                </div>
                <div class="form-add">
                    <label>
                    <p>Treść nakładanego znaku wodnego</p>
                    <input type="text" name="watermark" style="padding: 5px;" required>
                    </label>
                </div>
                <div class="form-add">
                    <label>
                        <p>Tu przeslij obrazek</p>
                        <input type = "file" name = "zdjecie" required>
                    </label>
                </div>
                <input type = "hidden" name="id">
                <div class="contactbuttons">
                    <button><a href="gallery">Wroc</a></button>
                    <input type="submit" value="Zapisz">
                </div>
            </form>
        </div>
    </body>
</html>