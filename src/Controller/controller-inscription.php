<?php

require_once '../../config.php';

// regex pour le formulaire
// uniquement des caractères alpha
$regex_name = "/^[a-zA-Z]+$/";

// un défini un tableau vide
$errors = [];

// lancement des test lors d'un post via formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['lastname'])) {
        // verifie si champs vide 
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['lastname'])) {
            $errors['lastname'] = 'caractère non autorisés';
        }
    }

    if (isset($_POST['firstname'])) {
        // verifie si champs vide 
        if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['firstname'])) {
            $errors['firstname'] = 'caractère non autorisés';
        }
    }
    
    // on se connect à la bdd
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    // on active les options
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // on stock les requette avec les marqueurs
    $sql = "SELECT * FROM `76_users` WHERE user_pseudo = :pseudo";
    // on prepare la requette pour se premunir des injections sql
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);

    $stmt->execute();
    
    $stmt->rowCount() == 0 ? $found =false : $found = true;

    $pdo = '';

    if (isset($_POST['pseudo'])) {
        // verifie si champs vide 
        if (empty($_POST['pseudo'])) {
            $errors['pseudo'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['pseudo'])) {
            $errors['pseudo'] = 'caractère non autorisés';
        }else if ($found == true){
            $errors['pseudo'] = 'Pseudo nom disponible';
        }
    }

      // on se connect à la bdd
      $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
      // on active les options
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // on stock les requette avec les marqueurs
      $sql = "SELECT * FROM `76_users` WHERE user_mail = :mail";
  // on prepare la requette pour se premunir des injections sql
      $stmt = $pdo->prepare($sql);
  
      $stmt->bindValue(':mail',$_POST['email'], PDO::PARAM_STR);
  
      $stmt->execute();
      
      $stmt->rowCount() == 0 ? $found =false : $found = true;
  
      $pdo = '';

    if (isset($_POST['email'])) {
        // verifie si champs vide 
        if (empty($_POST['email'])) {
            $errors['email'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'caractère non autorisés';
        }else if ($found == true){
            $errors['email'] = 'email nom disponible';
        }
    }

    if (isset($_POST['password'])) {
        // verifie si champs vide 
        if (empty($_POST['password'])) {
            $errors['password'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['password'])) {
            $errors['password'] = 'caractère non autorisés';
        }
    }

    if (isset($_POST['password'])) {
        // verifie si champs vide 
        if (empty($_POST['password'])) {
            $errors['password'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['password'])) {
            $errors['password'] = 'caractère non autorisés';
        }
    }

    if (isset($_POST['date'])) {
        // verifie si champs vide 
        if (empty($_POST['date'])) {
            $errors['date'] = 'champs obligatoire';
            // verifie si caractère autorisé

        }
    }

    if (!isset($_POST['genre'])) {
        // verifie si champs vide 
        $errors['genre'] = 'champs obligatoire';
    }

    // au final, si mon tableau d'erreurs est vide alors je lance ma requete d'inscription
    if (empty($errors)) {

        // on se connect à la bdd
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        // on active les options
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // on stock notre requete avec des marqueurs nominatifs 
        $sql = "INSERT INTO
`76_users` (
    `user_lastname`,
    `user_firstname`,
    `user_pseudo`,
    `user_gender`,
    `user_birthdate`,
    `user_mail`,
    `user_password`
) VALUES (
    :lastname, 
    :firstname,
    :pseudo,
    :genre,
    :date,
    :email,
    :password
);";

        // fonction permettant de nettoyer les inputs

        function safeInput($string)
        {
            $input = trim($string);
            $input = htmlspecialchars($input);
            return $input;
        }
        // on prepare la requete avant de l'executer

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':genre', $_POST['genre'], PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $stmt->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $stmt->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $stmt->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);

        if ($stmt->execute()) {
            header('Location: controller-confirmation.php');
            exit;
        }

        // on supprime l'instance pdo

        $pdo = '';
    }
}

include_once '../View/view-inscription.php';
