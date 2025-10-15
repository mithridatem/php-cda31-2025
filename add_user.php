<?php
//import du fichier user_request.php
include 'user_request.php';
include 'tools.php';

//tester si le formulaire est soumis
if (isset($_POST["submit"])) {
    //traitement du formulaire
    $result = add_user();
    //redirection
    header("Refresh:2; url=add_user.php");
}

/**
 * Méthode pour gérer l'ajout d'un utilisateur (formulaire)
 * @return string message de sortie
 */
function add_user(): string
{
    //Test si les champs sont vides
    if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        return "Veuillez remplir les 4 champs";
    }

    //Test si les 2 mot de passe correspondent
    if ($_POST["password"] != $_POST["verif_password"]) {
        return "Les 2 mots de passe ne correspondent pas";
    }

    //Nettoyer les entrées
    foreach ($_POST as $key => $value) {
        $_POST[$key] = sanitize($value);
    }

    if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{12,}$/', $_POST["password"]) ) {
        return "Le mot de passe doit contenir des maj, min, des chiffres et au moins 12 caractères de longueur";
    }

    //Vérifier si l'email est invalide
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        return "L'email n'est pas valide";
    }

    //Test si le compte n'existe pas
    if (is_user_exists($_POST["email"])) {
        return "Cet email n'est pas utilisable";
    }

    //hash du password
    $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);

    //Ajout du compte en BDD
    try {
        //import de l'image
        $file_name = import_file();
        //Ajout du nom dans la super globale POST
        $_POST["img"] = $file_name;
        //Test si l'utilisateur à importé une image
        if (!$file_name) {
            //Ajout de l'image par défaut dans la super globale POST
            $_POST["img"] = "profil.png";
        }
        //Ajout en BDD
        save_user($_POST);
        return "Le compte " . $_POST["email"] . " a été ajouté avec succes";
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function import_file(): bool|string {
    //Test si l'image existe
    if (isset($_FILES["img"])) {
        //ancien nom
        $old_name = $_FILES["image"]["name"];
        //extension
        $ext = strtolower(getFileExtension($old_name));
        //Test la taille est inférieure à 100K
        if ($_FILES["image"]["size"] > (100 * 1024 * 1024)) {
            echo "le fichier est trop grand";
            return false;
        }
        //Test si le fichier est un png ou jpeg ou jpg
        if ($ext != "png" && $ext != "jpg" && $ext != "jpeg") {
            echo " le format n'est pas valide";
            return false; 
        } 
        //nouveau nom
        $new_name = uniqid("img", true) . "." . $ext;
        //Déplacer le fichier
        move_uploaded_file($_FILES["image"]["tmp_name"], "public/asset/" . $new_name);
        return $new_name;
    }
    return false;
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
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="firstname" placeholder="Saisir votre prénom">
        <input type="text" name="lastname" placeholder="Saisir votre nom">
        <input type="email" name="email" placeholder="Saisir votre email">
        <input type="password" name="password" placeholder="Saisir un mot de passe">
        <input type="password" name="verif_password" placeholder="Répeter le mot de passe">
        <input type="file" name="img">
        <input type="submit" value="Ajouter" name="submit">
    </form>
    <p><?= $result ?? "" ?></p>
</body>

</html>
