 <?php
    session_start();
    ?>
 <!DOCTYPE html>
 <html lang="fr">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
     <link rel="stylesheet" type="text/css" href="../asset/css/support.css?refresh=<?php echo rand(2, 200) ?>">

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
         <main>

             <h3>CONTACTEZ NOUS </h3>

             <form action="" method="post">
                 <div class="formulaire">
                     <label for="email">E-mail: </label>
                     <input type="email" name="e-mail" id="email">


                 </div>
                 <div class="formulaire2">
                     <label for="commentary" id="comment">Veuillez indiquer le où les problèmes rencontrés ci-dessous :
                     </label>
                     <textarea name="area" id="commentary" cols="50" rows="20"></textarea>
                 </div>
                 <input type="submit" value="Envoyer" class="button">

             </form>

         </main>

         <footer>
             <div class="logo-social">
                 <div class="logo-footer"> <img src="../asset/image/facebook-footer-share.png" alt="logo facebook"></div>
                 <div class="logo-footer"> <img src="../asset/image/logo-twitter.png" alt="logo facebook"></div>
                 <div class="logo-footer"> <img src="../asset/image/logo-instagram.png" alt="logo facebook"></div>

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
                         document.location.href = '../php/profil.php';
                     });
                 </script>
         <?php
                }
            }
            ?>
     </body>

 </html>