<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', '12345678');

    $resultat = $bd->query('SELECT * FROM facture ORDER BY date_facture DESC');
    // $donnees = $resultat->fetch();
    $donnees='';
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
          <th>Prestation</th>


        <?php while ($donnees= $resultat ->fetch()) {
    ?>

          <tr>
            <td> <a href="./detailfacture.php?id=<?= $donnees['idfacture']; ?>" ><?= $donnees['numero']; ?></a></td>
            <td><?= $donnees['date_facture']; ?></td>
            <td><?= $donnees['motif_prestation']; ?></td>





          </tr>

      <?php
} ?>


    </table>
  </body>
</html>
