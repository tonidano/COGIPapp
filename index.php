<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=id7012993_gocip;charset=utf8', 'root', '12345678');
    $resultat1 = $bd->query('SELECT *
        FROM facture
        JOIN societes ON facture.societes_idsocietes = societes.idsocietes
        ORDER BY date_facture DESC LIMIT 0,5');
    $resultat2 = $bd->query('SELECT *
        FROM annuaire
        JOIN societes ON annuaire.idannuaire = societes.idsocietes
        ORDER BY idannuaire DESC LIMIT 0,5');
    $resultat3 = $bd->query('SELECT *
        FROM societes JOIN type ON societes.type_idtype = type.idtype
        ORDER BY idsocietes DESC LIMIT 0,5');
    $donnees1='';
    $donnees2='';
    $donnees3='';
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>

<body>
<div class="container-fluid">
    <?php include "./partials/check_login.php" ?>
  <p><a href="./partials/fournisseur.php">Fournisseurs</a></p>
  <p><a href="./partials/client.php">Clients</a></p>



     <h1>Gestion des données</h1>

     <h2>Factures</h2>


        <div class="col-lg-10 col-lg-offset-1">
            <table class="table">

                       <th>Numéro</th>
                       <th>Date</th>
                       <th>Société</th>
                     <?php while ($donnees1= $resultat1 ->fetch()) {
                  ?>

                 <tr>
                   <td><a href="./partials/updatefacture.php?id=<?= $donnees1['idfacture']; ?>"><?= $donnees1['numero']; ?></a></td>
                   <td><?= $donnees1['date_facture']; ?></td>
                   <td><a href="./partials/updatesociete.php?id=<?= $donnees1['idsocietes']; ?>"><?= $donnees1['nom_societe']; ?></a></td>
                   <td> <button type="submit" name="supprimer" onclick="deletefacture(<?= $donnees1['idfacture']; ?>)" ><i class="fas fa-trash-alt"></i></button> </td>
                 </tr>
                   <?php

                 } ?>
            </table>
            <input type="submit" name="ajouter" value="Ajouter" onclick="ajouterfacture()">
        </div>



     <h2 id="personnes">Personnes</h2>


        <div class="col-lg-10 col-lg-offset-1">
            <table class="table">

               <th>Nom</th>
               <th>Prénom</th>
               <th>Téléphone</th>
               <th>Email</th>
               <th>Société</th>
             <?php while ($donnees2= $resultat2 ->fetch()) {
          ?>

             <tr>
               <td><a href="./partials/update_client.php?id=<?= $donnees2['idannuaire']; ?>"><?= $donnees2['nom']; ?></a></td>
               <td><?= $donnees2['prenom']; ?></td>
               <td><?= $donnees2['telephone']; ?></td>
               <td><?= $donnees2['email']; ?></td>
               <td><a href="./partials/updatesociete.php?id=<?= $donnees2['idsocietes']; ?>"><?= $donnees2['nom_societe']; ?></a> <a href="partials/annuaire.php">  </a> </td>
               <td> <button type="submit" name="supprimer" onclick="deleteannuaire(<?= $donnees2['idannuaire']; ?>)" ><i class="fas fa-trash-alt"></i></button> </td>
             </tr>
         <?php
       } ?>
            </table>
            <input type="submit" name="ajouter" value="Ajouter" onclick="ajouterannuaire()">
        </div>



     <h2 id="entreprises">Entreprises</h2>


        <div class="col-lg-10 col-lg-offset-1">
            <table class="table">

           <th>Nom</th>
           <th>Téléphone</th>
           <th>Type</th>
         <?php while ($donnees3= $resultat3 ->fetch()) {
      ?>
           <tr>
             <td><a href="./partials/updatesociete.php?id=<?= $donnees3['idsocietes']; ?>"><?= $donnees3['nom_societe']; ?></a></td>
             <td><?= $donnees3['telephone_societe']; ?></td>
             <td><?= $donnees3['type']; ?></td>

             <td> <button type="submit" name="supprimer" onclick="deleteligne(<?= $donnees1['idfacture']; ?>)" ><i class="fas fa-trash-alt"></i></button> </td>
           </tr>
       <?php

     } ?>
     </table>
     <input type="submit" name="ajouter" value="Ajouter" onclick="ajouterligne()">
   </div>

 </div>

    function deletesociete(id){

    document.location.href = "./partials/deletesociete.php?id=" + id;
    }

    function ajoutersociete(id){

    document.location.href = "./partials/ajoutsociete.php?id=" + id;
    }



     <script>
     function deletefacture(id){
     document.location.href = "./partials/deletefacture.php?id=" + id;
     }
     function ajouterfacture(id){
     document.location.href = "./partials/ajoutfacture.php?id=" + id;
     }
     function deleteannuaire(id){
     document.location.href = "./partials/deleteannuaire.php?id=" + id;
     }
     function ajouterannuaire(id){
     document.location.href = "./partials/ajoutannuaire.php?id=" + id;
     }
     </script>

    </body>
 </html>
