<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=id7012993_gocip;charset=utf8', 'id7012993_antoni', 'gocip');
    $id = $_GET['id'];
    $resultat = $bd->query("SELECT * FROM facture
      JOIN annuaire ON facture.annuaire_idannuaire = annuaire.idannuaire
      JOIN societes ON facture.societes_idsocietes = societes.idsocietes
      JOIN type ON societes.type_idtype = type.idtype
      WHERE idfacture=$id");

    $donnees = $resultat->fetch();
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Facture</title>

  </head>
<body>

    <h1>Factures</h1>
    <table>

          <th>Numéro</th>
          <th>Date</th>
          <th>Société</th>
          <th>Type société</th>
          <th>Personne de contact</th>




          <tr>
            <td><?= $donnees['numero']; ?></td>
            <td><?= $donnees['date_facture']; ?></td>
            <td><?= $donnees['nom_societe']; ?></td>
            <td><?= $donnees['type']; ?></td>
            <td><?= $donnees['nom']; ?></td>



          </tr>



    </table>
  </body>
</html>
