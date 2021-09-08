  <?php
    session_start();
    ?>
  <!DOCTYPE html>
  <html lang="fr">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="../asset/css/profil.css?php echo time() ?>">
      <script src="../asset/js/a5af11d383.js" crossorigin="anonymous"></script>
      <title>Document</title>


  </head>


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

      <h2> Bonjour <?php echo $_SESSION['pseudo'] ?></h2>

      <div id="information">
          <div id="peopleInformation">
              <h3>Information personnelles</h3>
              <p>Nom: <?php echo $_SESSION["nom"] ?></p>
              <p>Prenom: <?php echo $_SESSION["prenom"] ?></p>
              <p>Date de naissance: <?php echo date_format(date_create($_SESSION["anniversaire"]), 'd M Y'); ?></p>
              <p>Identifiant: <?php echo $_SESSION["identifiant"] ?></p>
              <p>Pseudo: <?php echo $_SESSION['pseudo'] ?></p>
              <p>Email: <?php echo $_SESSION["Email"] ?></p>
          </div>
          <div id="modificationInformation">

              <form action='updateUser.php' method='POST'>
                  <p><label> Nom : <input type="text" name="Nom" value="<?php echo $_SESSION["nom"] ?>" required /> </p>
                  <p><label> Prénom : <input type="text" name="Prenom" value="<?php echo $_SESSION["prenom"] ?>" required /> </p>
                  <p><label> Date de naissance : <input type="date" name="Anniversaire" value="<?php echo $_SESSION["anniversaire"] ?>" required /> </p>
                  <p><label> Identifiant : <input type="text" name="identifiant" value="<?php echo $_SESSION["identifiant"] ?>" required /> </p>
                  <p><label> Pseudo : <input type="text" name="pseudo" value="<?php echo $_SESSION["pseudo"] ?>" required /> </p>
                  <p> <label> Email : <input type="email" name="Email" value="<?php echo $_SESSION["Email"] ?>" required /> </p>

                  <p> <input type="submit" value="Confirmer" /> </p>
              </form>

          </div>
          <form action="updateUser.php" id="btnSupprimer" method="POST">
              <input type="button" value="Modifier" id="modifier">
              <input type="submit" value="Supprimer le compte" name="deleteUser">
          </form>

      </div>





      <footer>
          <div class="logo-social">
              <div class="logo-footer"> <img src="../asset/image/facebook-footer-share.png" alt="logo facebook"></div>
              <div class="logo-footer"> <img src="../asset/image/logo-twitter.png" alt="logo facebook"></div>
              <div class="logo-footer"> <img src="../asset/image/logo-instagram.png" alt="logo facebook"></div>

          </div>
          <div class="join"> Rejoignez nous sur nos réseaux </div>

      </footer>
      <script src="../asset/js/profile.js"></script>
  </body>

  </html>