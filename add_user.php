<?php
//import du fichier user_request.php
include 'user_request.php';
include 'tools.php';

//tester si le formulaire est soumis
if (isset($_POST["submit"])) {
    $result = add_user();

}
//fonction pour gérer l'ajout d'un utilisateur (formulaire)
function add_user() {
    //Test si les champs sont vides
    if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        return "Veuillez remplir les 4 champs";
    }
    
    //nettoyer les entrées
    foreach ($_POST as $key => $value) {
        $_POST[$key] = sanitize($value);
    }

    //vérifier si l'email est valide
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        return "L'email n'est pas valide";
    }

    //hash du password
    $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    //Ajout du compte en BDD
    try {
        save_user($_POST);
        return "Le compte " . $_POST["email"] . " a été ajouté avec succes";
    } catch(Exception $e) {
        return $e->getMessage();
    }
}
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h2>Ajouter un utilisateur</h2>
    <form action="" method="post">
        <input type="text" name="firstname" placeholder="Saisir votre prénom">
        <input type="text" name="lastname" placeholder="Saisir votre nom">
        <input type="email" name="email" placeholder="Saisir votre email">
        <input type="password" name="password" placeholder="Saisir un mot de passe">
        <input type="submit" value="Ajouter" name="submit">
    </form>
    <p><?= $result ?? ""?></p>
</body>
</html>