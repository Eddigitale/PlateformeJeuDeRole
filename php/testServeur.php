<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <button id=test name="test" type="button"> test </button>

    <script src="../asset/js/testServeur.js"></script>
    <script>
        document.querySelector("#test").addEventListener("click", () => {
            <?php
            try {
                // --- Connexion à la base de données
                $connexion = new PDO('mysql:host=localhost;port=3306;dbname=jdr;charset=utf8', 'root', '');
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // --- Affichage du message d'erreur (en cas d'erreur)
                echo 'Faild Acess : ' . $e->getMessage();
            }
            ?>
        });
    </script>

</body>

</html>