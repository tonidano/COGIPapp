<?php

    try {
        $bd = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', '12345678');

        $resultat = $bd->query('SELECT * FROM annuaire');
        $donnees='';


    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    if (isset($_POST['ajouter'])) {
        $sql = "INSERT INTO annuaire (nom, prenom, telephone, email)
    VALUES (:nom, :prenom ,:telephone, :email)" ;

        $bd->exec($sql);

        $tab = array(

    ':nom'=> $_POST['nom'],
    ':prenom' => $_POST['prenom'],
    ':telephone'  => $_POST['telephone'],
    ':email'  => $_POST['email']
    );


        $req = $bd->prepare($sql);

        if ($req->execute($tab)) {
            $confirm = 'Le client a été ajouté avec succès !';
        } else {
            $confirm = 'Il y a une erreur dans le formulaire !';
        }
    }
?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ajout</title>
  </head>
<body>
  	<a href="../index.php">Accueil</a>
  <?php if (!isset($_POST['ajouter'])) {
    ?>
  <h1>Ajouter</h1>
  <form action="ajoutannuaire.php" method="post">
    <div>
 			<label for="nom">Nom</label>
 			<input type="text" name="nom" value="">
 		</div>

 			<div>
 			<label for="prenom">Prénom</label>
 			<input type="text" name="prenom" value="">
 		</div>
 		<div>
 			<label for="telephone">Téléphone</label>
 			<input type="number" name="telephone" value="">
 		</div>

    <div>
 			<label for="email">E-mail</label>
 			<input type="text" name="email" value="">
 		</div>

    <button type="submit" name="ajouter">Ajouter</button>
  </form>
  <?php
} else {
        echo $confirm;
    } ?>
  </body>
</html>
