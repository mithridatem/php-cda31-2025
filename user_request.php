<?php

include 'database.php';


/**
 * Méthode ajouter un utilisateur
 * @param array $user tableau de la super globale $_POST
 * @return void ne renvoie rien
 * @throws Exception en cas d'erreur SQL
 */
function save_user(array $user): void {
    //Requête SQL
    $sql = "INSERT INTO users(firstname, lastname, email, `password`, img) VALUE(?,?,?,?,?)";

    //Préparation de la requête SQL
    $bdd = connectBDD()->prepare($sql);
    //Assigner les paramètres
    $bdd->bindParam(1, $user["firstname"], PDO::PARAM_STR);
    $bdd->bindParam(2, $user["lastname"], PDO::PARAM_STR);
    $bdd->bindParam(3, $user["email"], PDO::PARAM_STR);
    $bdd->bindParam(4, $user["password"], PDO::PARAM_STR);
    $bdd->bindParam(5, $user["img"], PDO::PARAM_STR);
    //Exécution
    $bdd->execute();
}

//
/**
 * Méthode pour vérifier si le compte existe
 * @param string $email email pour vérifier si un compte match avec
 * @return bool true si le compte existe false si il n'existe pas
 * @throws Exception si il y à une erreur SQL
 */
function is_user_exists(string $email): bool {
    //Requête SQL
    $sql = "SELECT u.id, u.firstname FROM users AS u WHERE u.email = ?";
    //Préparation de la requête SQL
    $bdd = connectBDD()->prepare($sql);
    //Assigner le paramètre email
    $bdd->bindParam(1, $email, PDO::PARAM_STR);
    //Exécuter la requête
    $bdd->execute();

    //Test si le tableau est vide
    if (empty($bdd->fetch(PDO::FETCH_ASSOC))) {
        return false;
    }
    return true;
}