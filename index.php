<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="asset/css/core.css?refresh=<?php echo rand(2, 200) ?>">

    <title>Document</title>

</head>

<?php
if (isset($_POST['disconnection'])) {
    unset($_SESSION["pseudo"], $_SESSION["identifiant"], $_SESSION["nom"], $_SESSION["prenom"], $_SESSION["anniversaire"], $_SESSION["Email"]);
    $_SESSION["isConnected"] = false;
}

?>

<body id="body">
    <header>
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
                            <form action="#" method="POST">
                                <input type="submit" class="user_options" id="disconnection" name="disconnection" value="Déconnexion">
                            </form>

                        </div>
                    <?php

                    } else {
                    ?>
                        <a href="php/connection.php">Connexion</a>
                    <?php
                    }
                } else {
                    ?>
                    <a href="php/connection.php">Connexion</a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="menu">

            <a class="header-menu" href="index.php">Acceuil</a>
            <a class="header-menu" href="php/zone-jeu.php">Zone de jeu</a>
            <a class="header-menu" href="php/support.php">Support</a>

        </div>

    </header>
    <main>

        <h3> Description</h3>

        <p>
            Vous êtes actuellement sur un site qui a pour thême les JDR (jeu de role ).
            Ce site vous permettra d'avoir un support pour vos partie entre amis .
            Grace à ce site vous pourrez créer vos décors et avoir un visuel pour faire vivre au mieux vos histoires ,
            vous disposerez aussi d'un tchat et d'un tchat vocal pour communiquer avec les autres joueurs.
            La seule limite de ce site ?</br>
            Votre imagination.</br>
            Mais je ne m'inquiéte pas , si vous vous êtes redirigé ici c'est que vous êtes imaginatif .
            Et le plus important : </br><span>" AMUSEZ VOUS !"</span>

        </p>
    </main>
    <footer>
        <div class="logo-social">
            <div class="logo-footer"> <img src="asset/image/facebook-footer-share.png" alt="logo facebook"></div>
            <div class="logo-footer"> <img src="asset/image/logo-twitter.png" alt="logo facebook"></div>
            <div class="logo-footer"> <img src="asset/image/logo-instagram.png" alt="logo facebook"></div>

        </div>
        <div class="join"> Rejoignez nous sur nos réseaux </div>
    </footer>

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
                    document.location.href = 'php/profil.php';
                });
            </script>
    <?php
        }
    }
    ?>
</body>

</html>