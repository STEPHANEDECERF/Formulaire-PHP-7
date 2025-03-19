<?php

class Comments
{
    /**
     * Fonction permettant compter le nombre de commentaires du post avec son id
     * 
     * @param int $post_id
     * @return int
     * 
     */
    public static function countComments(int $post_id): int
    {
        // connexion à la base de données via PDO (PHP Data Objects) = création instance
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);

        // options activées sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // requete SQL me permettant de rechercher tous les commentaires selon l'id du post
        $sql = "SELECT COUNT(*) AS total FROM `76_comments` WHERE `post_id` = :post_id;";

        // on prepare la requete pour se prémunir des injections SQL
        $stmt = $pdo->prepare($sql);

        // on lie les paramètres
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);

        // on execute la requête
        $stmt->execute();

        // on stock le resultat de la requête dans un tableau associatif
        $countComments = $stmt->fetch(PDO::FETCH_ASSOC);

        // on ferme la connexion à la base de données
        $pdo = '';

        return $countComments['total'];
    }

    /**
     * Fonction permettant de récupérer tous les commentaires du post selon l'id du post
     * 
     * @param int $post_id
     * @return array
     * 
     */
    public static function getAllComments(int $post_id): array
    {
        // connexion à la base de données via PDO (PHP Data Objects) = création instance
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);

        // options activées sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // requete SQL me permettant de rechercher tous les commentaires selon l'id du post
        $sql = "SELECT `post_id`, `com_text`, `com_timestamp`,  `user_avatar`, `user_id`, `user_pseudo` FROM `76_comments`
        NATURAL JOIN `76_users` WHERE `post_id` = :post_id ORDER BY `com_timestamp` ASC;";

        // on prepare la requete pour se prémunir des injections SQL
        $stmt = $pdo->prepare($sql);

        // on lie les paramètres
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);

        // on execute la requête
        $stmt->execute();

        // on stock le resultat de la requête dans un tableau associatif
        $allComments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // on ferme la connexion à la base de données
        $pdo = '';

        return $allComments;
    }

    /**
     * Fonction permettant de créer un commentaire
     * 
     * @param int $post_id
     * @param int $user_id
     * @param string $com_text
     * @return void
     * 
     */
    public static function createComment(int $post_id, int $user_id, string $com_text): void
    {
        // connexion à la base de données via PDO (PHP Data Objects) = création instance
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);

        // options activées sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // requete SQL me permettant de rechercher tous les commentaires selon l'id du post
        $sql = "INSERT INTO `76_comments` (`post_id`, `user_id`, `com_text`, `com_timestamp`) VALUES (:post_id, :user_id, :com_text, :com_timestamp);";

        // on prepare la requete pour se prémunir des injections SQL
        $stmt = $pdo->prepare($sql);

        // on lie les paramètres
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':com_text', $com_text, PDO::PARAM_STR);
        $stmt->bindValue(':com_timestamp', time(), PDO::PARAM_INT);

        // on execute la requête
        $stmt->execute();

        // on ferme la connexion à la base de données
        $pdo = '';
    }

    /**
     * Fonction permettant de supprimer un commentaire selon l'id du com et l'id du user
     * 
     * @param int $com_id
     * @param int $user_id
     * @return void
     * 
     */
    public static function deleteComment(int $com_id, int $user_id): void
    {
        // connexion à la base de données via PDO (PHP Data Objects) = création instance
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);

        // options activées sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // requete SQL me permettant de rechercher tous les commentaires selon l'id du post
        $sql = "DELETE FROM `76_comments` WHERE `com_id` = :com_id AND `user_id` = :user_id;";

        // on prepare la requete pour se prémunir des injections SQL
        $stmt = $pdo->prepare($sql);

        // on lie les paramètres
        $stmt->bindValue(':com_id', $com_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);

        // on execute la requête
        $stmt->execute();

        // on ferme la connexion à la base de données
        $pdo = '';
    }
}