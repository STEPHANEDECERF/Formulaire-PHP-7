<?php
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


    if (isset($_POST['pseudo'])) {
        // verifie si champs vide 
        if (empty($_POST['pseudo'])) {
            $errors['pseudo'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['pseudo'])) {
            $errors['pseudo'] = 'caractère non autorisés';
        }
    }

    if (isset($_POST['email'])) {
        // verifie si champs vide 
        if (empty($_POST['email'])) {
            $errors['email'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'caractère non autorisés';
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

    if (isset($_POST['genre'])) {
        // verifie si champs vide 
        if (empty($_POST['genre'])) {
            $errors['genre'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['genre'])) {
            $errors['genre'] = 'caractère non autorisés';
        }
    }

    // au final, si mon tableau d'erreurs est vide alors redirection
    if (empty($errors)) {
        header('Location: ../View/view-confirmation.php');
        exit;
    }
}

var_dump($_POST);

include_once '../View/view-inscription.php';
?>