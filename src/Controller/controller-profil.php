<?php

session_start();

// on regarde si l'utilisateur est bien loggé
if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page profile si non
    header('Location: controller-connexion.php');
    exit;
}

// on charge le fichier de config
require_once '../../config.php';

// connexion à la base de données via PDO (PHP Data Objects) = création instance
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

// options activées sur notre instance
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// requete SQL me permettant de rechercher tous les posts
$sql = "SELECT * FROM `76_posts` NATURAL JOIN `76_pictures` WHERE `user_id` = " . $_SESSION['user_id'] . " ORDER BY `post_timestamp` DESC;";

// on prepare la requete pour se prémunir des injections SQL
$stmt = $pdo->query($sql);

// on stock le resultat de la requête dans un tableau associatif
$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);


$pdo = '';

?>








<?php include_once '../View/view-profil.php'; ?>