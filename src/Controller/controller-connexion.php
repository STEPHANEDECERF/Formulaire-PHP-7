<?php
require_once '../../config.php';


// un défini un tableau vide
$errors = [];

// lancement des test lors d'un post via formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['email'])) {
        // verifie si champs vide 
        if (empty($_POST['email'])) {
            $errors['email'] = 'champs obligatoire';
            // verifie si caractère autorisé
        }
    }

    if (isset($_POST['password'])) {
        // verifie si champs vide 
        if (empty($_POST['password'])) {
            $errors['password'] = 'champs obligatoire';
            // verifie si caractère autorisé
        }
    }

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        // on se connect à la bdd
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        // on active les options
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // on stock les requette avec les marqueurs
        $sql = "SELECT * FROM `76_users` WHERE user_pseudo = :email OR `user_mail`= :email";
        // on prepare la requette pour se premunir des injections sql
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);

        $stmt->execute();

        $stmt->rowCount() == 0 ? $found = false : $found = true;

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($found == false){
            $errors['connexion'] = 'identifiant ou mot de passe incorrect';
        } else {
            var_dump($user);
        }


    }
}
?>


<?php include_once '../View/view-connexion.php'; ?>