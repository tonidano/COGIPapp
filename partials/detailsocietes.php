<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=id7012993_gocip;charset=utf8', 'id7012993_antoni', 'gocip');
    $id=$_GET['id'];
    $reponse =  $bdd->query("SELECT nom_societe, adresse, telephone_societe, num_tva, motif_prestation, nom
      FROM facture
      JOIN societes
      ON facture.societes_idsocietes = societes.idsocietes
      JOIN annuaire ON facture.annuaire_idannuaire = annuaire.idannuaire


      WHERE idsocietes = $id");

    $donnees = $reponse->fetch();
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>details société</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    </head>
    <body>
      <!-- <h1>Nom de société: </h1> -->
      <h1><?= $donnees['nom_societe']  ?></h1>
      <!-- <p>Adresse: </p> -->
      <p><?= $donnees['adresse']  ?></p>
      <p>N° de téléphone: </p>
      <p><td><?= $donnees['telephone_societe']  ?></p>
      <p>Numéro de TVA: </p>
      <p><?= $donnees['num_tva']  ?></p>
      <p><?= $donnees['motif_prestation']  ?></p>
      <!-- <p>Type de clients: </p> -->
      <p><?= $donnees['nom']  ?></p>
            <!-- <table>
                <tr>
                    <th>Nom de société </th>
                    <th>Adresse </th>
                    <th>Pays </th>
                    <th>N° de téléphone </th>
                    <th>Numéro de TVA </th>
                    <th>Type de clients </th>
                </tr>
                <tr>
                    <td><?= $donnees['nom_societe']  ?></td>
                    <td><?= $donnees['adresse']  ?></td>
                    <td><?= $donnees['pays']  ?></td>
                    <td><?= $donnees['telephone_societe']  ?></td>
                    <td><?= $donnees['num_tva']  ?></td>
                    <td><?= $donnees['type']  ?></td>


                </tr>
            </table> -->
    </body>
</html>
