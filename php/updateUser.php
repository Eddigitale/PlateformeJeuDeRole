<?php
session_start();
if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
}

$connexion = new PDO('mysql:host=localhost;port=3306;dbname=jdr;charset=utf8', 'root', '');
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['Anniversaire']) && !empty($_POST['identifiant']) && !empty($_POST['pseudo'])  && !empty($_POST['Email'])) {
    $requete = $connexion->prepare("UPDATE user SET Nom = ?, Prenom = ?, Anniversaire = ?, Logins = ?, Pseudo = ?, Mail = ? WHERE Pseudo = ?");
    $requete->execute(array($_POST['Nom'], $_POST['Prenom'], $_POST['Anniversaire'], $_POST['identifiant'], $_POST['pseudo'], $_POST['Email'], $pseudo));
    $_SESSION['nom'] = $_POST['Nom'];
    $_SESSION['prenom'] = $_POST['Prenom'];
    $_SESSION['anniversaire'] = $_POST['Anniversaire'];
    $_SESSION['identifiant'] = $_POST['identifiant'];
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['Email'] = $_POST['Email'];

    header('Location: profil.php');
}

if (isset($_POST['deleteUser'])) {
    $requete = $connexion->prepare("DELETE FROM user WHERE Pseudo = ?");
    $requete->execute(array($pseudo));
    unset($_SESSION["pseudo"], $_SESSION["identifiant"], $_SESSION["nom"], $_SESSION["prenom"], $_SESSION["anniversaire"], $_SESSION["Email"]);
    $_SESSION["isConnected"] = false;
    header('Location: ../index.php');
}
