
<html>
    <head>
        <title>Nothing Store</title>
        <link rel='stylesheet' href="store.css">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <script src="store.js" defer></script>

    </head>
    <body>
        <nav id="nav">
            <div id="left"><a href="index.php">NOTHING(R)</a></div>
            <div id="ricerca">
                <form method="post" action="articolo.php">
                        <input  id="ricercainput" type="text" placeholder="ricerca Articoli" name="ricerca">
                        <input id="lente" type="image" src="lente.png">
                </form>
            </div>
            <div id="right">
                    <img  id="carrelloIMG" src="carrelloAcquisto.png">
                    <a href="login.php"><img src="iconaUtente.png"></a>
                </div>
            <div id="spazioCarrello">
                <div>
                    <p id="bottoneCHIUSO">CHIUSO</p>
                </div>
                <div class="SezioneProdotti">
                    <div id="prodotti">
                        <span>CARRELLO VUOTO</span>
                    </div>
                    <button id="svuotaCarrello">Svuota Carrello</button>
                </div>
            </div>
        </nav>

        <section id=Principale>
            <div id="divSinistro">
                <h2>LISTA ARTICOLI</h2>
                <ul id="ul">
                    <div>
                    <li>Phone (2)</li>
                    <li>Phone (2a)</li>
                    <li>Phone(2a)Plus</li>
                    <li>Phone (3a)</li>
                    <li>Phone (3a)Pro</li>
                    <li>Phone (3a)</li>
                    <li>Ear(open)</li>
                    <li>Ear</li>
                    <li>Ear(a)</li>
                    </div>
                    <div>
                    <li>Phone (2)Case</li>
                    <li>Phone (2)Screen Protector</li>
                    <li>Phone (2a)Case</li>
                    <li>Phone (2a)Screen Protector</li>
                    <li>Phone (3a)Case</li>
                    <li>Phone (3a)Pro Case</li>
                    <li>Power 45W</li>
                    <li>Cable 100cm</li>
                    <li>Cable 180cm</li>
                    </div>
                    <div>
                    <li>CMF Phone 1</li>
                    <li>CMF Phone Case</li>
                    <li>CMF Phone Lanyard</li>
                    <li>CMF Phone Stand</li>
                    <li>CMF Phone Card Holder</li>
                    <li>CMF Buds Pro 2</li>
                    <li>CMF Watch Pro 2</li>
                    <li>CMF Watch Pro 2 Bezel & Strap Set</li>
                    <li>CMF Power 100W GaN</li>
                    <li>CMF Power 140W GaN</li>
</div>
                </ul>
            </div>
            <div id="Evidenza">
                <h2>PRODOTTI IN EVIDENZA</h2>
            <div id="articoli">
                <div class="articolo"><img src="corpo3.webp"></div>
                <div class="articolo"><img src="corpo6.webp"></div>
                <div class="articolo"><img src="corpo10.webp"></div>
                <div class="articolo"><img src="corpo2.webp"></div>
                <div class="articolo"><img src="corpo5.webp"></div>
                <div class="articolo"><img src="corpo12.webp"></div>
            </div>
            </div>
        </section>

        <section class="modal">
            <div id="divDati">
                    <h1 id="nome">
                       <?php 
            echo $articolo['nome'];
            ?>
                    </h1>
                    <p id="chiudi" class="bottoneCHIUSO">X</p>
                </div>
                <div id="divDati2">
                    <h1 id="prezzo"></h1>
                    <p id="descrizione"></p>
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