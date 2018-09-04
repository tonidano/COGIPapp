<?php
try {
    $bd = new PDO('mysql:host=localhost;dbname=gocip;charset=utf8', 'root', '12345678');
    if (!isset($_POST['button'])) {
        $id = $_GET['id'];
        $resultat = $bd->query("SELECT * FROM annuaire WHERE idannuaire = $id");
        $donnees = $resultat->fetch();
    } else {
        $tab = array(
            ':idannuaire'=> $_POST['idannuaire'],
            ':nom'=> $_POST['nom'],
            ':prenom'=> $_POST['prenom'],
            ':telephone' => $_POST['telephone'],
            ':email'  => $_POST['email']
        );
        $sql = "UPDATE annuaire
                SET nom= :nom, prenom= :prenom, telephone= :telephone, email= :email
                WHERE idannuaire =:idannuaire";
        $req = $bd->prepare($sql);
        if ($req->execute($tab)) {
            $confirm = 'Les données du client ont été modifié avec succès !';
        } else {
            $confirm = 'Il y a une erreur dans le formulaire !';
        };
    }
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
} ?>

<!DOCTYPE html>
<html>
    <head>
      	<meta charset="utf-8">
      	<title>Modifier le client</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    </head>
<body>
    <div class="container-fluid">
  	<a href="../index.php">Accueil</a>
        <?php if (!isset($_POST['button'])) {
    ?>
	  <h2>Modifier</h2>
        <form action="update_client.php" method="post" id="forme">
        		<div>
        		    <label for="nom">Nom</label>
        			  <input type="text" name="nom" value="<?= $donnees['nom']?>">
        		</div>

      			<div>
          			<label for="prenom">Prénom</label>
          			<input type="text" name="prenom" value="<?= $donnees['prenom']; ?>">
      		  </div>

            <div>
          			<label for="telephone">Téléphone</label>
          			<input type="number" name="telephone" value="<?= $donnees['telephone']; ?>">
        		</div>

            <div>
          			<label for="email">E-mail</label>
          			<input type="text" name="email" value="<?= $donnees['email']; ?>">
        		</div>

        		<input type="hidden" name="idannuaire" value="<?= $id; ?>">
        		<button type="submit" name="button">Modifier</button>
        </form>
      </div>
<?php
} else {
        echo $confirm;
    } ?>

</body>
</html>
