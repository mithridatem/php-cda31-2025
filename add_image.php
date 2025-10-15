<?php
    include 'vendor/autoload.php';
    include 'tools.php';
    if (isset($_POST["submit"])) {
        
        //ancien nom
        $old_name = $_FILES["image"]["name"];
        //extension
        $ext = strtolower(getFileExtension($old_name));
        //nouveau nom
        $new_name = uniqid("img", true) . "." . $ext;
        //Vérifier la taille du fichier
        if ($_FILES["image"]["size"] > (100 * 1024 * 1024)) {
            echo "le fichier est trop grand";
        } 
        //Vérifier si le format
        else if 
            ($ext != "png" && $ext != "jpg" && $ext != "jpeg") {
                echo " le format n'est pas valide"; 
        } 
        //Sinon j'enregistre le fichier
        else {
            //Déplacer le fichier
            move_uploaded_file($_FILES["image"]["tmp_name"], "public/asset/" . $new_name);
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>importer des fichiers</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="importer" name="submit">
    </form>
</body>
</html>