<?php
    // Verifica che l'utente sia già loggato, in caso positivo va direttamente alla home
    include 'auth.php';
    if (checkAuth()) {
        header('Location: profile.php');
        exit;
    }

    if (!empty($_POST["email"]) && !empty($_POST["password"]) )
    {
        // Se username e password sono stati inviati
        // Connessione al DB
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        // ID e Username per sessione, password per controllo
        $query = "SELECT * FROM utente WHERE email = '".$email."'";
        // Esecuzione
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        if (mysqli_num_rows($res) > 0) 
        {
            // Ritorna una sola riga, il che ci basta perché l'utente autenticato è solo uno
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['pass'])) {

                // Imposto una sessione dell'utente
                $_SESSION["email"] = $entry['email'];
                $_SESSION["id"] = $entry['id_utente'];
                header("Location: index.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        // Se l'utente non è stato trovato o la password non ha passato la verifica
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["email"]) || isset($_POST["password"])) {
        // Se solo uno dei due è impostato
        $error = "Inserisci email e password.";
    }

?>

<html>
    <head>
        <title>Account-Nothing Italia</title>
        <meta charset="utf-8" />
        <link rel='stylesheet' href="login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&family=Noto+Sans+Thai:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        <script src="login.js" defer></script>
    </head>
    <body>
        <nav id="nav">
            <div id="left"><a href="index.php">NOTHING(R)</a></div>
        </nav>
        <section id="center">
            <div id="divimg">
                 <img src="login_photo.webp"></img>
            </div>

            <div id="divform">
                <h2>ACCEDI</h2>
                <div>
                    <?php
                    if (isset($error)) 
                    {
                        echo "<p class='error'>$error</p>";
                    }
                    ?>
                    <form name="login" method="post">
                        <p>
                            <input type="text" placeholder="E-MAIL" name="email">
                        </p>
                        <p>
                            <input type="password" placeholder="password" name="password">
                        </p>
                        <span>Password dimenticata?<a href="recupera.php">Clicca qui</a></span>
                        <p>
                            <input  id="submit" type="submit" value="Accedi" name="accesso">
                        </p>
                        <span>Effettuando l'accesso, accetti la nostra <a href="https://it.nothing.tech/pages/privacy-policy">informativa sulla privacy</a>.</span><br>
                        <span>Non sei registrato?<a href="signup.php">Crea un account qui</a></span>

                    </form>
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
