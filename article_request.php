<?php
//import de la BDD
include 'database.php';

function add_article(array $article) {

    //Requête ajouté l'article
    //Requête SQL
    $sql = "INSERT INTO article(title, content) VALUE(?,?)";
    //Préparer la requête
    $bdd = connectBDD()->prepare($sql);
    //Assigner les paramètres
    $bdd->bindParam(1, $article["title"], PDO::PARAM_STR);
    $bdd->bindParam(2, $article["content"], PDO::PARAM_STR);
    //Exécuter la requête
    $bdd->execute();
    //Récupérer l'id de l'article ajouté
    $id_article = connectBDD()->lastInsertId('article');

    foreach($article["categories"] as $category) {
        //Requête pour la table association
        $sql_article_category = "INSERT INTO article_category(id_article, id_category)
        VALUE(?,?)";
        //Préparer la requête
        $bdd_article_category = connectBDD()->prepare($sql_article_category);
        //Assigner les paramètres
        $bdd_article_category->bindParam(1, $id_article, PDO::PARAM_INT);
        $bdd_article_category->bindParam(2, $category, PDO::PARAM_INT);
        //Exécuter la requête
        $bdd_article_category->execute();
    }
}