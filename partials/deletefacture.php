<?php
try {
    $strConnection = 'mysql:host=localhost;dbname=gocip'; //Ligne 1
    $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $pdo = new PDO($strConnection, 'root', '12345678', $arrExtraParam); // Instancie la connexion
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne 4

    try {
        $bd = new PDO('mysql:host=localhost;dbname=id7012993_gocip;charset=utf8', 'id7012993_antoni', 'gocip');
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    $id=$_GET['id'];

        $sql = "DELETE FROM facture WHERE idfacture= $id" ;

        $bd->exec($sql);

        $tab = array(
      ':idfacture'=> $id

      );


        $req = $bd->prepare($sql);

        if ($req->execute($tab)) {
            $confirm = 'La facture a été supprimée avec succès !';
        } else {
            $confirm = 'Il y a une erreur dans le formulaire !';
        }

?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>delete_facture</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  </head>
  <body>
    <?= $confirm ?>
  </body>
</html>
