<<<<<<< HEAD
<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', '12345678');
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

=======

<?php

// $idArticle = '';
//

// switch ($_GET['page']) {
//         case 'client':
//           require "./partials/client.php";
//         break;
//         case 'facture':
//           require "./partials/facture.php";
//         break;
//         case 'societes':
//           require "./partials/societe.php";
//         break;
//
//
//
//     default:
//         // afficher la home page
//     echo "Home page";
//         break;
// }

 ?>

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
>>>>>>> 4fa877d5395cbb2311b3574adb499cbe4bd4d703

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
<<<<<<< HEAD
    <title>Facture</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/CSS/style.css">
=======
    <title>Accueil</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


>>>>>>> 4fa877d5395cbb2311b3574adb499cbe4bd4d703
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
<<<<<<< HEAD
    <tr>
      <td><a href="./partials/updatefacture.php?id=<?= $donnees1['idfacture']; ?>"><?= $donnees1['numero']; ?></a></td>
      <td><?= $donnees1['date_facture']; ?></td>
      <td><a href="./partials/updatesociete.php?id=<?= $donnees1['idsocietes']; ?>"><?= $donnees1['nom_societe']; ?></a></td>
      <td> <button type="submit" name="supprimer" onclick="deleteligne(<?= $donnees1['idfacture']; ?>)" ><i class="fas fa-trash-alt"></i></button> </td>
    </tr>
      <?php
} ?>
    </table>
    <input type="submit" name="ajouter" value="Ajouter" onclick="ajouterligne()">

=======
          <tr>
            <td><a href="./partials/updatefacture.php?id=<?= $donnees1['idfacture']; ?>"><?= $donnees1['numero']; ?></a></td>
            <td><?= $donnees1['date_facture']; ?></td>
            <td><a href="./partials/updatesociete.php?id=<?= $donnees1['idsocietes']; ?>"><?= $donnees1['nom_societe']; ?></a></td>
            <td> <button type="submit" name="supprimer" onclick="deleteligne(<?= $donnees1['idfacture']; ?>)" ><i class="fas fa-trash-alt"></i></button> </td>
          </tr>
      <?php
} ?>

    </table>
    <input type="submit" name="ajouter" value="Ajouter" onclick="ajouterligne()">
>>>>>>> 4fa877d5395cbb2311b3574adb499cbe4bd4d703
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
<<<<<<< HEAD
            <td><a href="./partials/update_client.php?id=<?= $donnees2['idannuaire']; ?>"><?= $donnees2['nom']; ?></a></td>
            <td><?= $donnees2['prenom']; ?></td>
            <td><?= $donnees2['telephone']; ?></td>
            <td><?= $donnees2['email']; ?></td>
            <td><a href="./partials/updatesociete.php?id=<?= $donnees2['idsocietes']; ?>"><?= $donnees2['nom_societe']; ?></a> <a href="partials/annuaire.php">  </a> </td>
            <td> <button type="submit" name="supprimer" onclick="deleteligne(<?= $donnees1['idfacture']; ?>)" ><i class="fas fa-trash-alt"></i></button> </td>
=======
            <td><?= $donnees2['nom']; ?></td>
            <td><?= $donnees2['prenom']; ?></td>
            <td><?= $donnees2['telephone']; ?></td>
            <td><?= $donnees2['email']; ?></td>
            <td><?= $donnees2['nom_societe']; ?></td>
>>>>>>> 4fa877d5395cbb2311b3574adb499cbe4bd4d703
          </tr>
      <?php
    } ?>
    </table>
<<<<<<< HEAD
    <input type="submit" name="ajouter" value="Ajouter" onclick="ajouterligne()">

=======
>>>>>>> 4fa877d5395cbb2311b3574adb499cbe4bd4d703
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
<<<<<<< HEAD
            <td> <button type="submit" name="supprimer" onclick="deleteligne(<?= $donnees1['idfacture']; ?>)" ><i class="fas fa-trash-alt"></i></button> </td>
          </tr>
      <?php
    } ?>
    </table>
    <input type="submit" name="ajouter" value="Ajouter" onclick="ajouterligne()">

    <script>
    function deleteligne(id){
    document.location.href = "./partials/deletefacture.php?id=" + id;
    }
    function ajouterligne(id){
    document.location.href = "./partials/ajoutfacture.php?id=" + id;
    }
=======
            <td><button>test</button></td>
          </tr>
      <?php
    } ?>

    </table>

    <script>

    function deleteligne(id){

    document.location.href = "./partials/deletefacture.php?id=" + id;
    }

    function ajouterligne(id){

    document.location.href = "./partials/ajoutfacture.php?id=" + id;
    }



>>>>>>> 4fa877d5395cbb2311b3574adb499cbe4bd4d703
    </script>
  </body>

</html>
