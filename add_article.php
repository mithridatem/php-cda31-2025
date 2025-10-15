<?php
//Import des dépendances
include 'article_request.php';
include 'tools.php';


//Récupération des catégories
$categories = get_all_categories();

//Test si le formulaire est soumis
if (isset($_POST["submit"])) {

    //Traitement du formulaire
    $message = add_article();
}

/**
 * Méthode qui gére le formulaire de d'ajout d'article
 * @return string retourne le message d'erreur ou de confirmation
 */
function add_article(): string
{

    //tester si les 2 champs ne sont remplis
    if (empty($_POST["title"]) || empty($_POST["content"])) {
        return "Veuillez remplir les 2 champs du formulaire";
    }
    //nettoyage des données du formulaire ($_POST)
    foreach ($_POST as $key => $value) {
        if (gettype($value) == 'string') {
            $_POST[$key] = sanitize($value);
        }
    }
    //tester si la taille du titre est minimum de 2 caractères
    if (strlen($_POST["title"]) <= 1) {
        return "Le titre doit faire au moins 2 caractères de longueur";
    }
    try {
        //Ajout en BDD
        save_article($_POST);
        return "L'article " . $_POST["title"] . " à bien été ajouté en BDD";
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
</head>

<body>
    <h2>Ajouter un article</h2>
    <form action="" method="post">
        <input type="text" name="title" placeholder="Saisir le titre de l'article">
        <textarea name="content" placeholder="Saisir le contenu de l'article"></textarea>
        <select name="categories[]" multiple>
            <option value="">Sélectionner les catégories</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="ajouter" name="submit">
    </form>
    <p><?= $message ?? "" ?></p>
</body>

</html>