<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8"/>
        <title>Moje hobby</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="static/libraries/jquery-3.5.1.js"></script>
        <style>
        label {
            display: inline-block;
            width: 5em;
        }
        </style>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
                $( document ).tooltip({
                track: true
                });
            } );
        </script>

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
                    <div class="navbar">
                        <ul class="navbar">
                            <li>
                                <a href="/index">Strona Główna</a>
                            </li>
                            <li>
                                <a href="/gallery">Galeria</a>
                            </li>
                            <li>
                                <a href="/contact">Kontakt</a>
                            </li>
                        </ul>
                    </div>
                    <div class="account">
                        <?php dispatch($routing, '/account')?>
                    </div>
                    <div class="przycisk_listy">
                        <div class="linia1"></div>
                        <div class="linia2"></div>
                        <div class="linia3"></div>
                    </div>
                </nav>
                <div class="headerblock">
                    <h1 class="naglowek">Galeria zdjęć</h1>
                </div>
            </div>
            <div class="dodaj">
                <a id="dodaj_zdj" href="add_image">Dodaj mnie tu zdjencie</a>
            </div>

            <?php dispatch($routing, '/pages')?>
            <?php dispatch($routing, '/images')?>

            <!--
            <div id="content-gallery"> 
                <div class="progress">
                    <div id="initial"></div>
                    <div class='completed'>
                        <p>Gratulacje, jesteś prawdziwym komiksowym nerdem! 😄</p>
                    </div>
                    <div id="progressbar"></div>
                </div>
                
                <div class="box-gallery" id="i1">
                    <div class="box-text">
                        <h2>
                            1. Batman - The Dark Knight Returns
                        </h2>
                        <p>Batman The Dark Knight Returns znalazł się na prawie każdej liście „Comic Book Best of”.</p>
                        <p>Konsekwentnie znajdował się w pierwszej piątce każdej listy najlepszych komiksów, a często nawet na pierwszym miejscu.</p>
                        <p>The Dark Knight Returns to czterowydaniowy miniserial z 1986 roku autorstwa Franka Millera, zilustrowany także przez Millera i Klausa Jansona i opublikowany przez DC Comics.</p>
                        <p>The Dark Knight Returns opowiada historię Bruce'a Wayne'a, który w wieku 55 lat wraca z emerytury, aby walczyć z przestępczością i staje w obliczu sprzeciwu policji Gotham City i rządu USA.</p>
                    </div>
                    <div class="box-img" title="Kliknij mnie by wyświetlić okładkę w oryginalnym rozmiarze"><a href="images/comic1.jpg"></a></div>
                    <div class="gallery-check">
                        <input type="checkbox" name="check" class="chbox" onclick="save()"/>
                        <p>Przeczytałem/am</p>
                    </div>
                </div>

                <div class="box-gallery" id="i2">
                    <div class="box-text">
                        <h2>
                            2. The Sandman
                        </h2>
                        <p>Mroczne fantasy, horror, surrealizm - wszystkie te style spotykają się w docenionej przez krytyków serii komiksów The Sandman z Vertigo Comics (podwydruk DC Comics).</p>
                        <p>The Sandman, napisany przez Neila Gaimana, opowiada historię Dream of the Endless, który rządzi światem snów.</p>
                        <p>Seria komiksów miała 75 numerów oraz trwała od stycznia 1989 do marca 1996.</p>
                    </div>
                    <div class="box-img" title="Kliknij mnie by wyświetlić okładkę w oryginalnym rozmiarze"><a href="images/comic2.jpg"></a></div>
                    <div class="gallery-check">
                        <input type="checkbox" name="check" class="chbox" onclick="save()"/>
                        <p>Przeczytałem/am</p>
                    </div>
                </div>

                <div class="box-gallery" id="i3">
                    <div class="box-text">
                        <h2>
                            3. Watchmen
                        </h2>
                        <p>Watchmen niezwykle często znajduje się na szczycie każdej listy „Best of comics”</p>
                        <p>Jest to najlepiej sprzedająca się powieść graficzna w historii komiksu, będąca częścią popularnego filmu, a później także serialu telewizyjnego.</p>
                        <p>Watchmen to powieść graficzna wydana przez DC Comics w 1986 i 1987 roku. Seria została stworzona przez brytyjską współpracę, w skład której weszli pisarz Alan Moore, artysta Dave Gibbons i kolorysta John Higgins.</p>
                    </div>
                    <div class="box-img" title="Kliknij mnie by wyświetlić okładkę w oryginalnym rozmiarze"><a href="images/comic3.jpg"></a></div>
                    <div class="gallery-check">
                        <input type="checkbox" name="check" class="chbox" onclick="save()"/>
                        <p>Przeczytałem/am</p>
                    </div>
                </div>

                <div class="box-gallery" id="i4">
                    <div class="box-text">
                        <h2>
                            4. Kingdom Come
                        </h2>
                        <p>Kingdom Come to czterowydaniowy miniserial wydany w 1996 roku przez DC Comics pod ich wydawnictwem Elseworlds.</p>
                        <p>Historia Kingdom Come rozgrywa się w przyszłości, która zajmuje się narastającym konfliktem między widocznie nieobecnymi, „tradycyjnymi” superbohaterami,
                             takimi jak Superman i Wonder Woman, a rosnącą popularnością w dużej mierze amoralnych i nieodpowiedzialnych nowych strażników.</p>
                        <p>Pomiędzy tymi dwiema grupami jest Batman, który próbuje powstrzymać eskalację katastrofy, udaremnić spiski Lexa Luthora i zapobiec destrukcyjnej nadludzkiej wojnie.</p>
                    </div>
                    <div class="box-img" title="Kliknij mnie by wyświetlić okładkę w oryginalnym rozmiarze"><a href="images/comic4.jpg"></a></div>
                    <div class="gallery-check">
                        <input type="checkbox" name="check" class="chbox" onclick="save()"/>
                        <p>Przeczytałem/am</p>
                    </div>
                </div>

                <div class="box-gallery" id="i5">
                    <div class="box-text">
                        <h2>
                            5. Marvels
                        </h2>
                        <p>Naprawdę piękny komiks z niezapomnianą grafiką, Marvels był komiksem z limitowanej serii czterech wydań napisanym przez Kurta Busieka i namalowanym przez Alexa Rossa.</p>
                        <p>Został opublikowany przez Marvel Comics w 1994 roku. Akcja Marvels toczy się w latach 1939-1974 i analizuje uniwersum Marvela, zbiorową scenerię większości serii superbohaterów Marvela, z perspektywy fotografa wiadomości Phila Sheldona.</p>
                        <p>Marvels odniósł krytyczny sukces, zdobywając wiele nagród.</p>
                    </div>
                    <div class="box-img" title="Kliknij mnie by wyświetlić okładkę w oryginalnym rozmiarze"><a href="images/comic5.jpg"></a></div>
                    <div class="gallery-check">
                        <input type="checkbox" name="check" class="chbox" onclick="save()"/>
                        <p>Przeczytałem/am</p>
                    </div>
                </div>

                <div class="box-gallery" id="i6">
                    <div class="box-text">
                        <h2>
                            6. Amazing Spider-Man
                        </h2>
                        <p>Kolejna kultowa seria Silver Age Marvel Comics, ta autorstwa Stana Lee i Steve'a Ditko, która przedstawiła światu niesamowitego Spider-Mana.</p>
                        <p>Grafika autorstwa Ditko jest uderzająca, a projekt kostiumu Spider-Mana jest jednym z najbardziej rozpoznawalnych w komiksach.</p>
                        <p>Czytelników na całym świecie poruszyła historia prześladowanego intelektualisty Petera Parkera, który ma zdumiewające moce, ale i dużą odpowiedzialność.</p>
                    </div>
                    <div class="box-img" title="Kliknij mnie by wyświetlić okładkę w oryginalnym rozmiarze"><a href="images/comic6.jpg"></a></div>
                    <div class="gallery-check">
                        <input type="checkbox" name="check" class="chbox" onclick="save()"/>
                        <p>Przeczytałem/am</p>
                    </div>
                </div>

                <div class="box-gallery" id="i7">
                    <div class="box-text">
                        <h2>
                            7. Batman - Year One
                        </h2>
                        <p>Mój drugi wpis o Batmanie na tej liście, Batman: Year One był komiksową fabułą opublikowaną przez DC Comics i opowiadającą o pierwszym roku Batmana walczącego z przestępczością.</p>
                        <p>Komiks ten został napisany przez Franka Millera, zilustrowany przez Davida Mazzucchelli, pokolorowany przez Richmonda Lewisa i napisany przez Todda Kleina.</p>
                        <p>Batman: Year One pierwotnie ukazał się w numerze 404–407 Batmana w 1987 roku. Opowiada także historię życia oficera policji Jamesa „Jima” Gordona.</p>
                    </div>
                    <div class="box-img" title="Kliknij mnie by wyświetlić okładkę w oryginalnym rozmiarze"><a href="images/comic7.jpg"></a></div>
                    <div class="gallery-check">
                        <input type="checkbox" name="check" class="chbox" onclick="save()"/>
                        <p>Przeczytałem/am</p>
                    </div>
                </div>
                
                <div class="box-gallery" id="i8">
                    <div class="box-text">
                        <h2>
                            8. Captain America
                        </h2>
                        <p>Captain America był wydawany przez cztery lata od stycznia 2005 do lipca 2009 przez Marvel Comics.</p>
                        <p>Kapitan Ameryka był najbardziej znany z wskrzeszenia partnera Kapitana Ameryki podczas II wojny światowej, Bucky'ego Barnesa, jako Zimowego Żołnierza, przypuszczalnej śmierci Steve'a Rogersa i przejęcia tożsamości Kapitana Ameryki przez Bucky'ego.</p>
                    </div>
                    <div class="box-img" title="Kliknij mnie by wyświetlić okładkę w oryginalnym rozmiarze"><a href="images/comic8.jpg"></a></div>
                    <div class="gallery-check">
                        <input type="checkbox" name="check" class="chbox" onclick="save()"/>
                        <p>Przeczytałem/am</p>
                    </div>
                </div>

                <div class="box-gallery" id="i9">
                    <div class="box-text">
                        <h2>
                            9. All-Star Superman
                        </h2>
                        <p>Jednen z najardziej lubianych komiksów przez krytyków i fanów.</p>
                        <p>All-Star Superman to dwanaście serii komiksów wydanych przez DC Comics. All-Star Superman trwał od listopada 2005 do października 2008.</p>
                        <p>Serial został napisany przez Granta Morrisona, narysowany przez Franka Quitely'a i cyfrowo napisany przez Jamiego Granta.</p>
                    </div>
                    <div class="box-img" title="Kliknij mnie by wyświetlić okładkę w oryginalnym rozmiarze"><a href="images/comic9.jpg"></a></div>
                    <div class="gallery-check">
                        <input type="checkbox" name="check" class="chbox" onclick="save()"/>
                        <p>Przeczytałem/am</p>
                    </div>
                </div>

                <div class="box-gallery" id="i10">
                    <div class="box-text">
                        <h2>
                            10. Batman - The Killing Joke
                        </h2>
                        <p>Wielu uważa Batman - The Killing Joke za ostateczną historię Jokera.</p>
                        <p>Batman: The Killing Joke to jednorazowa powieść graficzna DC Comics z 1988 roku napisana przez Alana Moore'a i zilustrowana przez Briana Bollanda.</p>
                        <p>The Killing Joke przedstawia historię pochodzenia Jokera i przedstawia Jokera próbującego doprowadzić Jima Gordona do szaleństwa oraz próbę powstrzymania go przez Batmana.</p>
                        <p>Historia wpłynęła na ciągłość głównego nurtu fabuły Batmana z powodu strzelaniny i paraliżu Barbary Gordon (aka Batgirl). Ta powieść graficzna cieszyła się dużym zainteresowaniem wśród wielu czytelników</p>
                    </div>
                    <div class="box-img" title="Kliknij mnie by wyświetlić okładkę w oryginalnym rozmiarze"><a href="images/comic10.jpg"></a></div>
                    <div class="gallery-check">
                        <input type="checkbox" name="check" class="chbox" onclick="save()">
                        <p>Przeczytałem/am</p>
                    </div>
                </div>
                -->
            </div>
            <footer>
                <p>&copy; Paweł Cichowski 2020</p>
            </footer>
        </div>
        <script src="static/scripts/app.js"></script>
        <script src="static/scripts/galleryapp.js"></script>
    </body>
</html>