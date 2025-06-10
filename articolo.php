<?php
require_once 'dbconfig.php';
    if (!empty($_POST["ricerca"]))
    {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        $ricerca = mysqli_real_escape_string($conn, $_POST['ricerca']);

        
        $query = "SELECT * FROM articolo WHERE nome = '".$ricerca."'";
       
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        if (mysqli_num_rows($res) > 0) 
        {
            $articolo = mysqli_fetch_assoc($res);
        }
    }

?>

<html>
    <head>
        <title>Nothing Italia</title>
        <meta charset="utf-8" />
        <link rel='stylesheet' href="articolo.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&family=Noto+Sans+Thai:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        <script src="articolo.js" defer></script>
    </head>
    <body>
        <nav id="nav">
            <div id="left"><a href="index.php">NOTHING(R)</a></div>
        </nav>
        <section id="center">
            <div id="divimg">
                 <img src="corpo3.webp"></img>
            </div>

            <div id="divInfo">
                <h1>
                    <?php 
                    if (isset($articolo) && isset($articolo['nome'])) {
                        echo htmlspecialchars($articolo['nome']);
                        } else {
                    echo '<h1>Articolo non disponibile</h1>';}
                    ?>
                </h1>
                <h2>
                    <?php 
                    if (isset($articolo) && isset($articolo['prezzo'])) {
                        echo "PREZZO:" . htmlspecialchars($articolo['prezzo']);
                        } else {
                    echo '';}
                    ?>
                </h2
                >
                <p>
                    <?php 
                    if (isset($articolo) && isset($articolo['descrizione'])) {
                        echo htmlspecialchars($articolo['descrizione']);
                        } else {
                        echo '';}
                    ?>
                </p>
                <div>
                    <?php 
                    if (isset($articolo)) {
                        echo '<button id="add" data-name="' . $articolo['nome'] . '">Aggiungi al carrello</button>';
                        } else {
                        echo '';}
                    ?>
                
                <a href="store.php"><button>Ritorna allo store</button></a>
            </div>
            </div>
        </section>

            <footer>
                <div id="divtop">
                    <div class="box1">
                        <ul>
                            <h4>Prodotti</h4>
                            <a href="https://it.nothing.tech/pages/phone-3a-pro"><li>Phone (3a)Pro</li></a>
                            <a href="https://it.nothing.tech/pages/phone-3a"><li>Phone (3a)</li></a>
                            <a href="https://it.nothing.tech/pages/phone-2a-plus"><li>Phone (2a)Plus</li></a>
                            <a href="https://it.nothing.tech/pages/phone-2a"><li>Phone (2a)</li></a>
                            <a href="https://it.nothing.tech/pages/phone-2a"><li>Phone (2)</li></a>
                            <a href="https://it.nothing.tech/products/ear-open"><li>Ear(open)</li></a>
                            <a href="https://it.nothing.tech/products/ear-a"><li>Ear(a)</li></a>
                            <a href="https://it.nothing.tech/products/ear"><li>Ear</li></a>
                            <a href="https://it.nothing.tech/pages/cmf-store"><li>Accessori</li></a>
                            <a href="https://it.nothing.tech/pages/apparel"> <li>Apparel</li></a>
                        </ul>
                        <ul>
                            <h4>Informazioni aziendali</h4>
                            <a href="https://it.nothing.tech/pages/about"><li>Su di noi</li></a>
                            <a href="https://it.nothing.tech/pages/careers"><li>Carriere</li></a>
                            <a href="https://nothing.community/"><li>Comunità</li></a>
                            <a href="https://it.nothing.tech/pages/student-program"><li>Programma per studenti</li></a>
                            <a href="https://it.nothing.tech/pages/sustainability"><li>Sostenibilità</li></a>
                            <a href="https://it.nothing.tech/pages/business-enquiry"><li>Richieste d'affari</li></a>
                            <a href="https://it.nothing.tech/pages/press-contact"><li>Contatto stampa</li></a>
                        </ul>
                        <ul>
                            <h4>Supporto</h4>
                            <a href="https://it.nothing.tech/pages/support-centre"><li>Supporto</li></a>
                            <a href="https://it.nothing.tech/pages/contact-support"><li>Contatta il supporto</li></a>
                            <a href="https://it.nothing.tech/pages/vulnerability-report"><li>Rapporto di vulnerabilità di sicurezza</li></a>
                        </ul>
                        </div>
                        
                        <div class="box2">
                            <h4>ISCRIVITI ALLA NEWSLETTER </h4>
                            <div id="email">
                                <input id="bottoneEmail" type="email" placeholder="E-MAIL">
                                <button id="bottoneEmailFreccia">></button>
                            </div>
                            <div id="esitoEmail">
                                
                            </div>
                            <div id="informativa">
                                <div id="container"><input type="checkbox"> <div> HO LETTO LA NOSTRA <br> <a href="https://it.nothing.tech/pages/privacy-policy">INFORMATIVA SULLA PRIVACY</a></div></div>
                                <div id="container"><input type="checkbox"> <div> ACCONSENTO A RICEVERE COMUNICAZIONI <br>PUBBLICITARIE DA NOTHING.</div></div>
                            </div>
                            <div>
                                <h4>Metodi di pagamenti accettati:</h4>
                                <div id="pagamenti">
                                    <img src="pag1.webp">
                                    <img src="pag2.webp">
                                    <img src="pag3.webp">
                                    <img src="pag4.webp">
                                    <img src="pag5.webp">
                                </div>
                            </div>
                        </div>
                </div>

                <div id="divbottom">
                    <div id="end">
                        <a href="https://it.nothing.tech/pages/privacy-policy"><div>Informativa sulla privacy</div></a>
                        <a href="https://it.nothing.tech/pages/terms-of-sales"><div>Condizioni di vendita</div></a>
                        <a href="https://it.nothing.tech/pages/user-agreement"><div>Condizioni dell'utente</div></a>
                        <a href="https://it.nothing.tech/pages/nothing-website-acceptable-use-policy"><div>Uso accettabile</div></a>
                    </div>
                    <div id="end2">
                    <div>
                        <a href="https://www.instagram.com/nothing/?hl=en"><img src="ig.png"></a>
                        <a href="https://www.youtube.com/c/NothingTechnology"><img src="youtube.png"></a>
                        <a href="https://x.com/nothing"><img src="x.png"></a>
                        <a href="https://www.tiktok.com/login?redirect_url=https%3A%2F%2Fwww.tiktok.com%2F%40nothing&lang=en&enter_method=mandatory"><img src="tiktok.png"></a>
                        <a href="https://discord.com/invite/nothingtech"><img src="twitch.png"></a>
                    </div>
                    <a href="https://it.nothing.tech/#as-country-popup"><div>Italia</div></a>
                    </div>
                </div>
            </footer>

    </body>
</html>

