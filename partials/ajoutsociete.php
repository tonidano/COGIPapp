<?php

    try {
        $bd = new PDO('mysql:host=localhost;dbname=id7012993_gocip;charset=utf8', 'id7012993_antoni', 'gocip');

        $resultat = $bd->query('SELECT * FROM societes
        JOIN type ON societes.idsocietes = type.idtype');
        $donnees='';
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    if (isset($_POST['ajouter'])) {
        $sql = "INSERT INTO societes (nom_societe, adresse, pays, telephone_societe, num_tva, type_idtype)
    VALUES (:nom_societe, :adresse ,:pays, :telephone_societe, :num_tva, :type_idtype)" ;

        $bd->exec($sql);

        $tab = array(

    ':nom_societe'=> $_POST['nom_societe'],
    ':adresse' => $_POST['adresse'],
    ':pays'  => $_POST['pays'],
    ':telephone_societe'  => $_POST['telephone_societe'],
    ':num_tva'  => $_POST['num_tva'],
    ':type_idtype'  => $_POST['type_idtype']
    );


        $req = $bd->prepare($sql);

        if ($req->execute($tab)) {
            $confirm = 'La société a été ajoutée avec succès !';
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
  <form action="ajoutsociete.php" method="post">
    <div>
 			<label for="nom_societe">Nom de la société</label>
 			<input type="text" name="nom_societe" value="">
 		</div>

 			<div>
 			<label for="adresse">Adresse</label>
 			<input type="text" name="adresse" value="">
 		</div>
 		<div>
 			<label for="pays">pays</label>
 			<input type="text" name="pays" value="">
 		</div>

    <div>
 			<label for="telephone_societe">Téléphone</label>
 			<input type="number" name="telephone_societe" value="">
 		</div>
    <div>
 			<label for="num_tva">Numéro de TVA</label>
 			<input type="number" name="num_tva" value="">
 		</div>
    <div>
      <label>Type</label>
      <select name="type_idtype">
      <?php while ($donnees= $resultat ->fetch()) {
        ?>
        <option value="<?= $donnees['type_idtype']; ?>"><?= $donnees['type']; ?></option>
      <?php
    } ?>
      </select>
    </div>

    <button type="submit" name="ajouter">Ajouter</button>
  </form>
  <?php
} else {
        echo $confirm;
    } ?>
  </body>
</html>
