<?php
//Import des dépendances
include 'article_request.php';
include 'tools.php';


//Récupération des catégories
$categories = get_all_categories();
//Test si le formulaire est soumis
if (isset($_POST["submit"])) {
    save_article($_POST);
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