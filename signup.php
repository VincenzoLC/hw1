<?php
    require_once 'auth.php';
    if (checkAuth()) 
    {
        header("Location: home.php");
        exit;
    }
    if (!empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["passwordrepeat"]))
    {
        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
       
        if (strlen($_POST["nome"]) < 3) {
            $error[] = "Caratteri nome insufficienti";
        } 
        if (strlen($_POST["cognome"]) < 3) {
            $error[] = "Caratteri cognome insufficienti";
        } 
        # PASSWORD
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
        # CONFERMA PASSWORD
        if (strcmp($_POST["password"], $_POST["passwordrepeat"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        # EMAIL
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } 
        else 
        {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM utente WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }


        # REGISTRAZIONE NEL DATABASE
        if (count($error) == 0) {
            $name = mysqli_real_escape_string($conn, $_POST['nome']);
            $surname = mysqli_real_escape_string($conn, $_POST['cognome']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO utente(nome, cognome, email, pass) VALUES('$name', '$surname', '$email', '$password')";
            mysqli_query($conn, $query);
        }
        mysqli_close($conn);
    }
    else
    {
        $error = array("Riempi tutti i campi");
    }
?>

<html>
    <head>
        <title>Account-Nothing Italia</title>
        <link rel='stylesheet' href="signup.css">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <script src="signup.js" defer></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&family=Noto+Sans+Thai:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        
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
                <h2>REGISTRATI</h2>
                <div>
                    <form name="signup" method="post">
                        <p class="name">
                            <input type="text" placeholder="Nome" name="nome">
                            <span>Devi inserire un nome</span>
                        </p>
                        <p class="surname">
                            <input type="text" placeholder="Cognome" name="cognome">
                            <span>Devi inserire un cognome</span>
                        </p>
                        <p class="email">
                            <input type="text" placeholder="e-mail" name="email">
                            <span id="spanEmail">Devi inserire una e-mail valida</span>
                        </p>
                        <p class="password">
                            <input type="password" placeholder="Password" name="password">
                            <span>Devi inserire una password valida</span>
                        </p>
                        <p class="checkpassword">
                            <input type="password" placeholder="Ripeti password" name="passwordrepeat">
                            <span>Le password non corrispondono</span>
                        </p>
                        <p class="submit">
                            <input  id="submit" type="submit" value="Registrati" name="accesso">
                            <span>Errori nell'inserimento dati</span>
                        </p>
                        
                        <span>Effettuando la registrazione, accetti la nostra <a href="https://it.nothing.tech/pages/privacy-policy">informativa sulla privacy</a>.</span>
                        <span>Hai un account?<a href="login.php">Accedi qui</a></span>

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
