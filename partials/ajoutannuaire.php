<?php

    try {
        $bd = new PDO('mysql:host=localhost;dbname=id7012993_gocip;charset=utf8', 'id7012993_antoni', 'gocip');

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

    ':nom'=> $_POST['nom'] = filter_var($_POST['motif_prestation'], FILTER_SANITIZE_STRING),
    ':prenom' => $_POST['prenom'] = filter_var($_POST['motif_prestation'], FILTER_SANITIZE_STRING),
    ':telephone'  => $_POST['telephone'],
    ':email'  => $_POST['email'] = filter_var($_POST['motif_prestation'], FILTER_SANITIZE_EMAIL)
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
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  </head>
<body>
    <div class="container-fluid">

  	<a href="../index.php">Accueil</a>
  <?php if (!isset($_POST['ajouter'])) {
    ?>
  <h2>Ajouter</h2>

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

</div>

  <?php
} else {
        echo $confirm;
    } ?>
  </body>
</html>
