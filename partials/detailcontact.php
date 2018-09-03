<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', '12345678');
    $id=$_GET['id'];
    $reponse =  $bdd->query("SELECT *
      -- FROM annuaire_has_societes
      -- LEFT JOIN societes
      -- ON annuaire_has_societes.societes_idsocietes = societes.idsocietes
      -- LEFT JOIN annuaire
      -- ON annuaire.idannuaire = annuaire_has_societes.annuaire_idannuaire
      -- WHERE $id=idannuaire;

      FROM facture
      LEFT JOIN societes ON facture.societes_idsocietes = societes.idsocietes
      LEFT JOIN annuaire ON facture.annuaire_idannuaire = annuaire.idannuaire

      WHERE idannuaire=$id");
    $donnees = $reponse->fetch();
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link href="../assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>detail_contact</title>
    </head>
    <body>
        <h1>Coucou</h1>
            <table class="table">
                <tr class="info">
                    <th>Nom </th>
                    <th>Prénom </th>
                    <th>Téléphone </th>
                    <th>E-mail </th>
                    <th>Nom de la société où travaille la personne </th>
                    <th>Adresse de la société </th>
                    <th>La liste des factures liées à la personne </th>
                </tr>
                <tr>
                    <td><?= $donnees['nom']  ?></td>
                    <td><?= $donnees['prenom']  ?></td>
                    <td><?= $donnees['telephone']  ?></td>
                    <td><?= $donnees['email']  ?></td>
                    <td><?= $donnees['nom_societe']  ?></td>
                    <td><?= $donnees['adresse']  ?></td>
                    <td><?= $donnees['motif_prestation']  ?></td>
                </tr>
            </table>
    </body>
</html>
