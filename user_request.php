<?php

include 'database.php';

//Méthode ajouter un utilisateur
function add_user(array $user) {
    //Requête SQL
    $sql = "INSERT INTO users(firstname, lastname, email, `password`) VALUE(?,?,?,?)";
    try {
        //Préparation de la requête SQL
        $bdd = connectBDD()->prepare($sql);
        //Assigner les paramètres
        $bdd->bindParam(1, $user["firstname"], PDO::PARAM_STR);
        $bdd->bindParam(2, $user["lastname"], PDO::PARAM_STR);
        $bdd->bindParam(3, $user["email"], PDO::PARAM_STR);
        $bdd->bindParam(4, $user["password"], PDO::PARAM_STR);
        //Exécution
        $bdd->execute();
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}