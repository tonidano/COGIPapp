<?php
try {
    $bd = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', '12345678');

    if (!isset($_POST['button'])) {
        $id = $_GET['id'];
        $resultat = $bd->query("SELECT * FROM societes WHERE idsocietes = $id");

        $donnees = $resultat->fetch();
    } else {
        $tab = array(
                ':idsocietes'=> $_POST['idsocietes'],
                ':nom_societe'=> $_POST['nom_societe'],
                ':adresse'=> $_POST['adresse'],
                ':pays' => $_POST['pays'],
                ':telephone_societe'  => $_POST['telephone_societe'],
                ':num_tva'  => $_POST['num_tva']
      );
        $sql = "UPDATE societes SET nom_societe= :nom_societe, adresse= :adresse, pays= :pays, telephone_societe= :telephone_societe, num_tva= :num_tva   WHERE idsocietes =:idsocietes";
        $req = $bd->prepare($sql);
        if ($req->execute($tab)) {
            $confirm = 'La société a été modifiée avec succès !';
        } else {
            $confirm = 'Il y a une erreur dans le formulaire !';
        };
    }
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier la société</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
  <div class="container-fluid">
	<a href="../index.php">Accueil</a>
  <?php if (!isset($_POST['button'])) {
     ?>
	<h2>Modifier</h2>
	<form action="updatesociete.php" method="post" id="forme">
		<div>
			<label for="nom_societe">Nom</label>
			<input type="text" name="nom_societe" value="<?= $donnees['nom_societe']?>">
		</div>

			<div>
			<label for="adresse">Adresse</label>
			<input type="text" name="adresse" value="<?= $donnees['adresse']; ?>">
		</div>
		<div>
			<label for="pays">Pays</label>
			<input type="text" name="pays" value="<?= $donnees['pays']; ?>">
		</div>
    <div>
      <label for="telephone_societe">Téléphone</label>
      <input type="number" name="telephone_societe" value="<?= $donnees['telephone_societe']; ?>">
    </div>
    <div>
      <label for="num_tva">Numéro TVA</label>
      <input type="number" name="num_tva" value="<?= $donnees['num_tva']; ?>">
    </div>

		<input type="hidden" name="idsocietes" value="<?= $id; ?>">
		<button type="submit" name="button">Modifier</button>
	</form>
</div>
<?php
 } else {
     echo $confirm;
 } ?>


</body>
</html>
