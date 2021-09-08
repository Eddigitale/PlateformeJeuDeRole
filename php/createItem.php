<?php
session_start();

//si le champ de texte n'est pas vide 

// --- Récupération des données dans les input (via l'attribut "name")
if (isset($_POST['writting-zone'])) {
    $item = $_POST['writting-zone'];
}
//--- Try: Essaie ce code - Catch(Exception e): Attrape l'exception et renvoie ce code
try {
    // --- Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;port=3306;dbname=jdr;charset=utf8', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!empty($item)) {
        // --- Préparation de la requête INSERT
        $sth = $connexion->prepare('INSERT INTO `chest`(`IdUser`,`Item`,`Counter`) VALUES ((SELECT Id FROM `user` WHERE Pseudo = :pseudo), :item, 1)');
        // --- Liaison de variables sur la requête via ":item"
        $sth->bindParam(':item', $item, PDO::PARAM_STR);
        $sth->bindParam(':pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
        // --- Exécution de la requête
        $sth->execute();
        // nouvelle requete qui ecrase la premiere(sth) APRES son execution    
    }
} catch (PDOException $e) {
    // --- Affichage du message d'erreur (en cas d'erreur)
    echo 'Faild Acess : ' . $e->getMessage();
}
