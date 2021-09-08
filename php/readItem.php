
<?php
session_start();

try {

    // --- Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;port=3306;dbname=jdr;charset=utf8', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $requete = $connexion->prepare('SELECT * FROM `chest` WHERE `IdUser`= ?  ');
    $requete->execute(array($_SESSION["IdUser"]));
    // récupération des données MYSQL via une boucle
    $res = [];
    class Objet
    {
        public $Id;
        public $Items;
        public $Counter;

        // public function __construct($Id, $Items, $Counter)
        // {
        //     $this->Id = $Id;
        //     $this->Items = $Items;
        //     $this->Counter = $Counter;
        // }
    }

    while ($row = $requete->fetch()) {
        $id = $row["Id"];
        $items = $row["Item"];
        $counter = $row["Counter"];
        //$obj = new Objet($id, $items, $counter);
        $obj = new Objet;
        $obj->Id = $id;
        $obj->Items = $items;
        $obj->Counter = $counter;
        array_push($res, $obj);

        //$res = ['Id' => $id, 'Item' => $items, 'Counter' => $counter];
    }

    echo json_encode($res);
} catch (PDOException $e) {
    // --- Affichage du message d'erreur (en cas d'erreur)
    echo 'Faild Acess : ' . $e->getMessage();
}
