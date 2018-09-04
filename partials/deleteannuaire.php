<?php

    try {
        $bd = new PDO('mysql:host=localhost;dbname=id7012993_gocip;charset=utf8', 'id7012993_antoni', 'gocip');
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    $id=$_GET['id'];
        $sql1 = "DELETE FROM annuaire_has_societes WHERE annuaire_idannuaire= $id";
        $sql2 = "DELETE FROM annuaire WHERE idannuaire= $id" ;



        $bd->exec($sql1);
        $bd->exec($sql2);
        $tab = array(
      ':annuaire_idannuaire'=> $id

      );


        $req = $bd->prepare($sql1);
        $req = $bd->prepare($sql2);

        if ($req->execute($tab)) {
            $confirm = 'Le client a été supprimé avec succès !';
        } else {
            $confirm = 'Il y a une erreur dans le formulaire !';
        }

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>suppression client</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  </head>
  <body>
    <?= $confirm ?>
  </body>
</html>
