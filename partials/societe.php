<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', '');

    $resultat = $bd->query('SELECT * FROM societes ORDER BY nom_societe ASC');
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
    <title>Société</title>

  </head>
<body>

    <h1>Sociétés</h1>
    <table>

          <th>Nom de la société</th>



        <?php while ($donnees= $resultat ->fetch()) {
    ?>

          <tr>
            <td> <a href="./detailsocietes.php?id=<?= $donnees['idsocietes']; ?>" ><?= $donnees['nom_societe']; ?></a></td>






          </tr>

      <?php
} ?>


    </table>
  </body>
</html>
