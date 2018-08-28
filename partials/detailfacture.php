<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', '');

    $resultat = $bd->query('SELECT * FROM facture');
    $donnees = $resultat->fetch();
    // $donnees='';
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
// $reponse->closeCursor();

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


        <?php {
    ?>

          <tr>
            <td><?= $donnees['numero']; ?></td>
            <td><?= $donnees['date_facture']; ?></td>
            <td><?= $donnees['societes_idsocietes']; ?></td>
            <td><?= $donnees['type_idtype']; ?></td>
            <td><?= $donnees['annuaire_idannuaire']; ?></td>


          </tr>

      <?php
} ?>


    </table>
  </body>
</html>
