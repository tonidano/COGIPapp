<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {

  // On teste pour voir si nos variables ont bien été enregistrées



    echo 'Bonjour '.$_SESSION['login'].', soyez le bienvenu !';


// On affiche un lien pour fermer notre session
    // echo '<a href="./login.php">Déconnection</a>';
} else {
    echo 'Les variables ne sont pas déclarées.';
}


if (isset($_POST['logout'])) {

// On démarre la session
    session_start();

    // On détruit les variables de notre session
    session_unset();

    // On détruit notre session
    session_destroy();

    // On redirige le visiteur vers la page d'accueil
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Logout</title>
</head>

<body>
  <form  action="check_login.php" method="post">
    <input type="submit" name="logout" value="Logout">

  </form>

</body>
</html>
