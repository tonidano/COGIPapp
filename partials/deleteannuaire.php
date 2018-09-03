<?php
try {
    $strConnection = 'mysql:host=localhost;dbname=gocip'; //Ligne 1
    $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $pdo = new PDO($strConnection, 'root', '12345678', $arrExtraParam); // Instancie la connexion
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne 4

    $id=$_GET['id'];
    $query = "DELETE FROM annuaire WHERE idannuaire= $id";

    if ($rowCount = $pdo->exec($query)) {
        $confirm = 'Le client a été supprimé avec succès !';
    } else {
        $confirm = 'Il y a une erreur dans le formulaire !';
    };
} catch (PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?= $confirm ?>
  </body>
</html>