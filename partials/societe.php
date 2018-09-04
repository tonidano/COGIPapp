<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=id7012993_gocip;charset=utf8', 'id7012993_antoni', 'gocip');

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
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  </head>
<body>
    <div class="container-fluid">
    <h2>Sociétés</h2>
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
  </div>
  </body>
</html>
