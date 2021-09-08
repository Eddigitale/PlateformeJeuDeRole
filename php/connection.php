<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../asset/css/connection.css?refresh=<?php echo rand(2, 200) ?>">

    <title>Document</title>

</head>

<body id="body">

    <body id="body">
        <header>
            <div class="alignement_connection">
                <div class="Titre">
                    <h1>Titre</h1>
                </div>
                <div class="connection">
                    <a href="connection.php">Connexion</a>
                </div>
            </div>
            <div class="menu">

                <a class="header-menu" href="../index.php">Acceuil</a>
                <a class="header-menu" href="zone-jeu.php">Zone de jeu</a>
                <a class="header-menu" href="support.php">Support</a>

            </div>

        </header>
        <h3>CONNEXION</h3>

        <body>
            <div class="formulaire">
                <form action='ConnectionUser.php' method='POST'>
                    <p><label> Identifiant : <input type="text" name="identifiant2" required /> </p>
                    <p> <label> Mot de passe : <input type="password" name="mdp2" required /> </p>
                    <a id="lienInscription" href="inscription.php">Inscrivez vous</a>
                    <p> <input type=submit /> </p>
                    <div>
                        <?php
                        if (isset($_SESSION['mdpfalse'])) {

                            if ($_SESSION['mdpfalse']) {
                        ?>
                                <p id="error"> Identifiant ou mot de passe incorrects </p>
                        <?php
                                unset($_SESSION['mdpfalse']); // supprime la variable mdpfalse  de la session
                            }
                        }
                        ?>
                    </div>

                </form>
            </div>
        </body>


        <footer>
            <div class="logo-social">
                <div class="logo-footer"> <img src="../asset/image/facebook-footer-share.png" alt="logo facebook"></div>
                <div class="logo-footer"> <img src="../asset/image/logo-twitter.png" alt="logo facebook"></div>
                <div class="logo-footer"> <img src="../asset/image/logo-instagram.png" alt="logo facebook"></div>

            </div>
            <div class="join"> Rejoignez nous sur nos réseaux </div>
        </footer>
    </body>

</html>