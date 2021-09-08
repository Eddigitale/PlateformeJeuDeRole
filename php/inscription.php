<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../asset/css/inscription.css?refresh=<?php echo rand(2, 200) ?>">

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
        <h3>INSCRIPTION</h3>

        <main>
            <div id="informationInscriptionPosition">
                <div id="informationInscription">
                    <form action='ConnectionUser.php' method='POST'>
                        <p><label> Nom : <input type="text" name="Nom" required /> </p>
                        <p><label> Prénom : <input type="text" name="Prenom" required /> </p>
                        <p><label> Date de naissance : <input type="date" name="Anniversaire" required /> </p>
                        <p><label> Identifiant : <input type="text" name="identifiant" required /> </p>
                        <p><label> Pseudo : <input type="text" name="pseudo" required /> </p>
                        <p> <label> Mot de passe : <input type="password" name="mdp" required /> </p>
                        <p> <label> Confirmation de Mot de passe : <input type="password" name="confirmation" required /> </p>
                        <p> <label> Email : <input type="email" name="Email" required /> </p>
                        <p> <label> Confirmation Email : <input type="email" name="ConfirmationMail" required /> </p>

                        <div id="btnInscription">
                            <p> <input type="submit" value="S'inscrire" /> </p>
                        </div>
                    </form>
                </div>

            </div>
        </main>


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