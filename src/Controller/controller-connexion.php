<?php

session_start();

// on regarde si l'utilisateur est bien loggé
if (isset($_SESSION['user_id'])) {
    // on renvoie vers la page profile si non
    header('Location: controller-profil.php');
    exit;
}

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

        if ($found == false) {
            $errors['connexion'] = 'identifiant ou mot de passe incorrect';
        } else {
            if (password_verify($_POST['password'], $user['user_password'])) {
                // nous stockons les données de l'utilisateur dans la session
                $_SESSION = $user;

                // nous supprimons le mot de passe de la session
                unset($_SESSION['user_password']);
                unset($_SESSION['user_activated']);

                // nous redirigeons l'utilisateur vers son profil
                header('Location: controller-profil.php');
                exit;
            } else {
                $errors['connexion'] = 'identifiant ou mot de passe incorrect';
            }
        }
    }
}
?>


<?php include_once '../View/view-connexion.php'; ?>