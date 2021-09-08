<?php
session_start();

$connexion = new PDO('mysql:host=localhost;port=3306;dbname=jdr;charset=utf8', 'root', '');
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*-------------------------------------------------compte utilisateurs inscription -----------------------------------------------*/
if (isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Anniversaire']) && isset($_POST['identifiant']) && isset($_POST['pseudo']) &&  isset($_POST['mdp']) && isset($_POST['Email'])) {
    $requete = $connexion->prepare("INSERT INTO user(Logins,Pseudo,Nom,Prenom,Anniversaire,Passwords,Mail) VALUE(?,?,?,?,?,?,?)");
    $requete->execute(array($_POST['identifiant'], $_POST['pseudo'], $_POST['Nom'], $_POST['Prenom'], $_POST['Anniversaire'], $_POST['mdp'], $_POST['Email']));
}


/*-------------------------------------------------compte utilisateurs connexion -----------------------------------------------*/
$isConnected = false;
$mdpfalse;
if (!empty($_POST['identifiant2']) && !empty($_POST['mdp2'])) {
    $requete = $connexion->prepare("SELECT * FROM user WHERE logins=? and Passwords=?");
    $requete->execute(array($_POST['identifiant2'], $_POST['mdp2']));
    $donnee = $requete->fetch();
    if ($donnee) {
        while ($donnee) {
            if ($_POST['identifiant2'] == $donnee['Logins'] && $_POST['mdp2'] == $donnee['Passwords']) {
                $_SESSION["identifiant"] = $donnee['Logins'];
                $_SESSION["pseudo"] = $donnee['Pseudo'];
                $_SESSION["nom"] = $donnee['Nom'];
                $_SESSION["prenom"] = $donnee['Prenom'];
                $_SESSION["anniversaire"] = $donnee['Anniversaire'];
                $_SESSION["Email"] = $donnee['Mail'];
                $_SESSION["IdUser"] = $donnee['Id'];
                header('Location:../index.php');
                $isConnected = true;
                break;        //casse la boucle 
            }
        }
    } else {
        header('Location:connection.php');
        $mdpfalse = true;
        $isConnected = false;
    }
} else {
    header('Location:connection.php');
    $isConnected = false;
}
$_SESSION['isConnected'] = $isConnected;
$_SESSION['mdpfalse'] = $mdpfalse;
