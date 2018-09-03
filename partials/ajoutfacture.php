<?php

    try {
        $bd = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', '12345678');

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
    ':motif_prestation'  => $_POST['motif_prestation'],
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
  </head>
<body>
  	<a href="../index.php">Accueil</a>
  <?php if (!isset($_POST['ajouter'])) {
    ?>
  <h1>Ajouter</h1>
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
  <?php
} else {
        echo $confirm;
    } ?>
  </body>
</html>
