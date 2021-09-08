<?php
try {
    // --- Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;port=3306;dbname=jdr;charset=utf8', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $requete = $connexion->prepare("UPDATE chest SET `Counter` = ? WHERE `Id` = ?");
    $requete->execute((array($_POST['count'], $_POST['IdItem'])));
} catch (PDOException $e) {
    // --- Affichage du message d'erreur (en cas d'erreur)
    echo 'Faild Acess : ' . $e->getMessage();
}
