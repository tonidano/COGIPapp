<?php
try {
    $bd = new PDO('mysql:host=localhost;dbname=id7012993_gocip;charset=utf8', 'id7012993_antoni', 'gocip');

    if (!isset($_POST['button'])) {
        $id = $_GET['id'];
        $resultat = $bd->query("SELECT * FROM facture WHERE idfacture = $id");

        $donnees = $resultat->fetch();
    } else {
        $tab = array(
                ':idfacture'=> $_POST['idfacture'],
                ':numero'=> $_POST['numero'],
                ':date_facture' => $_POST['date_facture'],
                ':motif_prestation'  => $_POST['motif_prestation']
        );
        $sql = "UPDATE facture SET numero= :numero, date_facture= :date_facture, motif_prestation= :motif_prestation  WHERE idfacture =:idfacture";
        $req = $bd->prepare($sql);
        if ($req->execute($tab)) {
            $confirm = 'La facture a été modifiée avec succès !';
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
	<title>Modifier la facture</title>

</head>
<body>
	<a href="../index.php">Accueil</a>
  <?php if (!isset($_POST['button'])) {
     ?>
	<h1>Modifier</h1>
	<form action="updatefacture.php" method="post">
		<div>
			<label for="numero">Numéro</label>
			<input type="number" name="numero" value="<?= $donnees['numero']?>">
		</div>

			<div>
			<label for="date_facture">Date</label>
			<input type="date" name="date_facture" value="<?= $donnees['date_facture']; ?>">
		</div>
		<div>
			<label for="motif_prestation">Prestation</label>
			<input type="text" name="motif_prestation" value="<?= $donnees['motif_prestation']; ?>">
		</div>

		<input type="hidden" name="idfacture" value="<?= $id; ?>">
		<button type="submit" name="button">Modifier</button>
	</form>
<?php
 } else {
     echo $confirm;
 } ?>


</body>
</html>
