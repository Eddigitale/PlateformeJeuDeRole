    <?php
    session_start();
    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../asset/css/zone-jeu.css?refresh=<?php echo time() ?>">
        <script src="../asset/js/a5af11d383.js" crossorigin="anonymous"></script>
        <title>Document</title>


    </head>


    <body id="body">
        <header>
            <div id="session">
            </div>
            <div class="alignement_connection">
                <div class="Titre">
                    <h1>Titre</h1>
                </div>
                <div class="connection">
                    <?php
                    if (isset($_SESSION['isConnected'])) {
                        if ($_SESSION['isConnected']) {
                    ?>
                            <button id="account"><?php echo $_SESSION["pseudo"] ?></button>
                            <div id="account_options">
                                <button class="user_options" id="profile">Profil</button>
                                <form action="../index.php" method="POST">
                                    <input type="submit" class="user_options" id="disconnection" name="disconnection" value="Déconnexion">
                                </form>

                            </div>
                        <?php
                        } else {
                        ?>
                            <a href="connection.php">Connexion</a>
                        <?php
                        }
                    } else {
                        ?>
                        <a href="connection.php">Connexion</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="menu">

                <a class="header-menu" href="../index.php">Acceuil</a>
                <a class="header-menu" href="zone-jeu.php">Zone de jeu</a>
                <a class="header-menu" href="support.php">Support</a>

            </div>

        </header>

        <?php

        if (isset($_SESSION["isConnected"])) {
            if ($_SESSION["isConnected"]) { ?>
                <main>
                    <div id="menu_jeu">
                        <div id="dice">
                            <div>
                                <button id="diceButton"> </button>
                            </div>

                            <div id="diceOptions">

                                <input type="radio" id="diceSix" name="diceValue" value=6>
                                <label for="diceSix">Dé de 6 </label>
                                <input type="radio" id="diceTwenty" name="diceValue" value=20>
                                <label for="diceSix">Dé de 20 </label><br />
                                <input type="radio" id="diceTwenty" name="diceValue" value=100>
                                <label for="diceSix">Dé de 100 </label><br />

                                <input type="radio" name="diceValue" value="diceCrafting" /> dé personnalisé <input type="text" id="diceCrafting" disabled />
                                <div id="diceValidationPosition">
                                    <button id='diceValidation'>Lancé du dé</button>
                                </div>

                            </div>
                        </div>

                        <div id="chest-position">

                            <button id="button-chest"> </button>

                            <div id="inventory">

                                <div id="zone_text"></div>

                                <form id="envoi_text">
                                    <input id="writting-zone" type="text" name="writting-zone" placeholder="Entrez votre item" autofocus /> </br>
                                    <input type="submit" value="Ajouter" />
                                </form>

                            </div>
                        </div>
                    </div>
                </main>
                <div class='zone-jeu'>
                    <div class="zone-tchat">
                        <div class="tchat">
                            <ul id="messages"></ul>
                        </div>
                        <div class="position_message">
                            <input id="message" type="text" name="zone-message" placeholder="Votre message..." />
                            <button id="button-chat" onclick="send()">Envoyer</button>
                        </div>
                    </div>


                    <div class="regroup-zone">
                        <div class="zone-dragdrop">

                        </div>
                        <div id="zone-objet">
                            <?php
                            $connexion = new PDO('mysql:host=localhost;port=3306;dbname=jdr;charset=utf8', 'root', '');
                            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sth = $connexion->prepare('SELECT * FROM `images`');
                            $sth->execute();
                            $image = array();
                            $idImage = array();
                            $nom = array();
                            $type = array();
                            while ($row = $sth->fetch()) { // fetch recupere les resultats qui se trouvent dans la base de donnée 
                                array_push($image, $row["Image"]);
                                array_push($idImage, $row["Id"]);
                                array_push($nom, $row["Nom"]);
                                array_push($type, $row["Type"]);
                            }

                            ?>
                            <?php

                            for ($i = 0; $i < count($image); $i++) {
                            ?>
                                <div class="objet"><img id="image<?php echo $idImage[$i] ?>" src="<?php echo $image[$i] ?>" alt="objet" title="<?php echo $nom[$i] ?>">

                                </div>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>
            <?php

            } else {
            ?>
                <div class="avertissementPosition">
                    <div class='avertissement'>
                        <p> Vous devez vous <a href="connection.php"> connecter </a> pour accéder à cette partie du site. </p>
                    </div>
                </div>
            <?php
            }
        } else { ?>
            <div class="avertissementPosition">
                <div class='avertissement'>
                    <p> Vous devez vous <a href="connection.php"> connecter </a> pour accéder à cette partie du site. </p>
                </div>
            </div>
        <?php
        }
        ?>


        <footer>

            <div class="logo-social">
                <div class="logo-footer"> <img src="../asset/image/facebook-footer-share.png" alt="logo facebook"></div>
                <div class="logo-footer"> <img src="../asset/image/logo-twitter.png" alt="logo facebook"></div>
                <div class="logo-footer"> <img src="../asset/image/logo-instagram.png" alt="logo facebook"></div>

            </div>
            <div class="join"> Rejoignez nous sur nos réseaux </div>
        </footer>
        <script src="./socket.io/socket.io.js"></script>
        <script src="../asset/js/readItem.js"></script>
        <script src="../asset/js/zone-jeu.js"></script>
        <script src="../asset/js/createItem.js"></script>
        <script src="../asset/js/updateItem.js"></script>
        <script src="../asset/js/deleteItem.js"></script>
        <script src="../asset/js/dragDrop.js"></script>
        <script src="../asset/js/dice.js"></script>
        <script src="../asset/js/tchat.js"></script>

        <?php
        if (isset($_SESSION["isConnected"])) {
            if ($_SESSION["isConnected"]) { ?>
                <script>
                    document.querySelector("#account_options").style.display = "none";

                    document.querySelector("#account").addEventListener("click", () => {
                        if (document.querySelector("#account_options").style.display === "none") {
                            document.querySelector("#account_options").style.display = "block";
                        } else {
                            document.querySelector("#account_options").style.display = "none";
                        }
                    });


                    document.querySelector("#profile").addEventListener("click", () => {
                        document.location.href = '../php/profil.php';
                    });
                </script>
        <?php
            }
        }
        ?>
    </body>


    </html>