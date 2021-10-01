<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="static/libraries/jquery-3.5.1.js"></script>

    <link rel="stylesheet" href="static/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div id="container">
        <a id="do-gory">
            <span>Do góry</span>
        </a>
        <div class="small_header">
            <nav>
                <div class="logo">
                    <img src="static/images/logo_komiksy.svg"></img>
                </div>
                <ul class="navbar">
                    <li>
                        <a href="/index">Strona Główna</a>
                    </li>
                    <li>
                        <a href="/gallery">Galeria</a>
                        <!--
                        <ul>
                            <li><a href="#i1">Okładka 1</a></li>
                            <li><a href="#i2">Okładka 2</a></li>
                            <li><a href="#i3">Okładka 3</a></li>
                            <li><a href="#i4">Okładka 4</a></li>
                            <li><a href="#i5">Okładka 5</a></li>
                            <li><a href="#i6">Okładka 6</a></li>
                            <li><a href="#i7">Okładka 7</a></li>
                            <li><a href="#i8">Okładka 8</a></li>
                            <li><a href="#i9">Okładka 9</a></li>
                            <li><a href="#i10">Okładka 10</a></li>
                        </ul>
                        -->
                    </li>
                    <li>
                        <a href="/kontakt">Kontakt</a>
                    </li>
                </ul>
                <div class="przycisk_listy">
                    <div class="linia1"></div>
                    <div class="linia2"></div>
                    <div class="linia3"></div>
                </div>
            </nav>
            <div class="headerblock">
                <h1 class="naglowek">Kontakt</h1>
            </div>
        </div>
        <div id="content"> 
            <div class="formularz">
                <div class="form">
                    <input type="text" id="imie" name="imie" autocomplete="off" required/>
                    <label for="imie" class="label-imie">
                        <span class="content-imie">Imię</span>
                    </label>
                </div>
                <div class="form">
                    <input type="text" id="nazwisko" name="nazwisko" autocomplete="off" required/>
                    <label for="nazwisko" class="label-nazwisko">
                        <span class="content-nazwisko">Nazwisko</span>
                    </label>
                </div>
                
                <div class="radio">
                    <div class="radio-male">
                        <input type="radio" id="mezczyzna" name="radio"/>
                        <label for="mezczyzna" class="label-radio">
                            <span class="content-radio">Mężczyzna</span>
                        </label>
                    </div>
                    <div class="radio-female">
                        <input type="radio" id="kobieta" name="radio"/>
                        <label for="kobieta" class="label-radio">
                            <span class="content-radio">Kobieta</span>
                        </label>
                    </div>
                </div>

                <div class="textboxdiv">
                    <p>Podziel się swoimi ulubionymi komiksami!</p>
                    <textarea class="textbox" cols="5" rows="1"></textarea>
                </div>
                <div class="contactbuttons">
                    <button class="contactbutton" value="s" onclick="sendform()">Wyślij</button>
                    <button class="contactbutton" value="Wyczyść" onclick="resetform()">Wyczyść</button>
                </div>
                <div class="date">
                    <p>Podaj datę urodzenia</p>
                    <input type="date" name="date">
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="checkbox">
                    Zgadzam się na przetwarzanie moich danych osobowych
                </div>
            </div>
        </div>
        <footer>
            <p>&copy; Paweł Cichowski 2020</p>
        </footer>
    </div>
    <script src="static/scripts/app.js"></script>
    <script src="static/scripts/contactapp.js"></script>
</body>
</html>