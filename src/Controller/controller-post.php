<?php

session_start();

require_once '../../config.php';

// on regarde si l'utilisateur est bien loggé
if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page profile si non
    header('Location: controller-connexion.php');
    exit;
}


require_once "../Model/model-comments.php";


// connexion à la base de données via PDO (PHP Data Objects) = création instance
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

// options activées sur notre instance
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// requete SQL me permettant de rechercher tous les posts
$sql = "SELECT `user_id`,`post_id`,`post_timestamp`,`post_description`,`pic_name`,`user_pseudo`,`user_avatar` FROM `76_posts` 
NATURAL JOIN 76_pictures
NATURAL JOIN 76_users
WHERE `post_id`= :post_id;";

// on prepare la requete pour se prémunir des injections SQL
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':post_id', $_GET['post_id'], PDO::PARAM_STR);

$stmt->execute();

// on stock le resultat de la requête dans un tableau associatif
$post = $stmt->fetch(PDO::FETCH_ASSOC);

$pdo = '';

$allComments = Comments::getAllComments($_GET['post_id']);

?>

<?php include_once "../View/view-post.php" ?>



