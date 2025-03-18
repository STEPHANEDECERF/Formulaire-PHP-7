<?php

session_start();

// on regarde si l'utilisateur est bien loggé
if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page profile si non
    header('Location: controller-connexion.php');
    exit;
}

?>

<?php include_once "../View/view-post.php"?>



