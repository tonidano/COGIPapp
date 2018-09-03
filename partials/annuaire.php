<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', '12345678');
    $reponse =  $bdd->query('SELECT * FROM annuaire ORDER BY nom ASC LIMIT 10');
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
        <title>annuaire</title>
    </head>
    <body>
        <table class="table">
            <tr class="info">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>E-mail</th>
            </tr>
<?php
    while ($donnees = $reponse->fetch()) {
        ?>
            <tr>
                <td> <a href="./detailcontact.php?id=<?= $donnees['idannuaire']; ?>" ><?= $donnees['nom']; ?></a></td>
                <td><?= $donnees['prenom']  ?></td>
                <td><?= $donnees['telephone']  ?></td>
                <td><?= $donnees['email']  ?></td>
            </tr>
<?php
    }
?>
        </table>

    </body>
</html>
