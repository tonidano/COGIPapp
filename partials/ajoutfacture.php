<?php

    try {
        $bd = new PDO('mysql:host=localhost;dbname=id7012993_gocip;charset=utf8', 'id7012993_antoni', 'gocip');

        $resultat = $bd->query('SELECT * FROM facture
      JOIN societes ON facture.societes_idsocietes = societes.idsocietes');
        $donnees='';

        $resultat1 = $bd->query('SELECT * FROM facture
      JOIN annuaire ON facture.annuaire_idannuaire = annuaire.idannuaire');
        $donnees1='';
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    if (isset($_POST['ajouter'])) {
        $sql = "INSERT INTO facture (numero, date_facture, motif_prestation,  societes_idsocietes, annuaire_idannuaire)
    VALUES (:numero, :date_facture ,:motif_prestation, :societes_idsocietes, :annuaire_idannuaire)" ;

        $bd->exec($sql);

        $tab = array(

    ':numero'=> $_POST['numero'],
    ':date_facture' => $_POST['date_facture'],
    ':motif_prestation'  => $_POST['motif_prestation'] = filter_var($_POST['motif_prestation'], FILTER_SANITIZE_STRING),
    ':societes_idsocietes' => $_POST['societes_idsocietes'],
    ':annuaire_idannuaire'  => $_POST['annuaire_idannuaire']
    );


        $req = $bd->prepare($sql);

        if ($req->execute($tab)) {
            $confirm = 'La facture a été ajoutée avec succès !';
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
  <div class="col-lg-6 col-lg-offset-3">
  <form action="ajoutfacture.php" method="post">
    <div>
 			<label for="numero">Numéro</label>
 			<input type="number" name="numero" value="">
 		</div>

 			<div>
 			<label for="date_facture">Date</label>
 			<input type="date" name="date_facture" value="">
 		</div>
 		<div>
 			<label for="motif_prestation">Prestation</label>
 			<input type="text" name="motif_prestation" value="">
 		</div>
    <div>
      <label>Nom de la société</label>
      <select name="societes_idsocietes">
      <?php while ($donnees= $resultat ->fetch()) {
        ?>
          <option value="<?= $donnees['societes_idsocietes']; ?>"><?= $donnees['nom_societe']; ?></option>
      <?php
    } ?>
      </select>
    </div>
    <div>
      <label>Nom client</label>
      <select name="annuaire_idannuaire">
      <?php while ($donnees1= $resultat1 ->fetch()) {
        ?>
        <option value="<?= $donnees1['annuaire_idannuaire']; ?>"><?= $donnees1['nom']; ?></option>
      <?php
    } ?>
      </select>
    </div>
    <button type="submit" name="ajouter">Ajouter</button>
  </form>
</div>
</div>
  <?php
} else {
        echo $confirm;
    } ?>
  </body>
</html>
