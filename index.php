<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', '');

    $resultat1 = $bd->query('SELECT *
      FROM facture
      JOIN societes ON facture.societes_idsocietes = societes.idsocietes
      ORDER BY date_facture DESC LIMIT 0,5');
    $resultat2 = $bd->query('SELECT *
      FROM annuaire_has_societes
      LEFT JOIN societes ON annuaire_has_societes.societes_idsocietes = societes.idsocietes
      LEFT JOIN annuaire ON annuaire.idannuaire = annuaire_has_societes.annuaire_idannuaire
      ORDER BY idannuaire DESC LIMIT 0,5');
    $resultat3 = $bd->query('SELECT *
       FROM societes JOIN type ON societes.type_idtype = type.idtype
       ORDER BY idsocietes DESC LIMIT 0,5');
    // $donnees = $resultat->fetch();
    $donnees1='';
    $donnees2='';
    $donnees3='';
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
    <title>Accueil</title>

  </head>
<body>
  <p><a href="./partials/fournisseur.php">Fournisseurs</a></p>
  <p><a href="./partials/client.php">Clients</a></p>
    <h1>Factures</h1>
    <table>
          <th>Numéro</th>
          <th>Date</th>
          <th>Société</th>
        <?php while ($donnees1= $resultat1 ->fetch()) {
    ?>
          <tr>
            <td><a href="./partials/updatefacture.php?id=<?= $donnees1['idfacture']; ?>"><?= $donnees1['numero']; ?></a></td>
            <td><?= $donnees1['date_facture']; ?></td>
            <td><a href="./partials/updatesociete.php?id=<?= $donnees1['idsocietes']; ?>"><?= $donnees1['nom_societe']; ?></a></td>
          </tr>
      <?php
} ?>
    </table>
    <h1>Personnes</h1>
    <table>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Téléphone</th>
          <th>Email</th>
          <th>Société</th>
        <?php while ($donnees2= $resultat2 ->fetch()) {
        ?>

          <tr>
            <td><?= $donnees2['nom']; ?></td>
            <td><?= $donnees2['prenom']; ?></td>
            <td><?= $donnees2['telephone']; ?></td>
            <td><?= $donnees2['email']; ?></td>
            <td><?= $donnees2['nom_societe']; ?></td>
          </tr>
      <?php
    } ?>
    </table>
    <h1>Entreprises</h1>
    <table>
          <th>Nom</th>
          <th>Téléphone</th>
          <th>Type</th>
        <?php while ($donnees3= $resultat3 ->fetch()) {
        ?>
          <tr>
            <td><a href="./partials/updatesociete.php?id=<?= $donnees3['idsocietes']; ?>"><?= $donnees3['nom_societe']; ?></a></td>
            <td><?= $donnees3['telephone_societe']; ?></td>
            <td><?= $donnees3['type']; ?></td>
            <td><button>test</button></td>
          </tr>
      <?php
    } ?>

    </table>
  </body>
</html>
