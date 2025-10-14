<?php
    include 'vendor/autoload.php';
    include 'tools.php';
    if (isset($_POST["submit"])) {
        //ancien nom du fichier
        dd($_FILES["image"]);
        $old_name = $_FILES["image"]["name"];
        //extension 
        $ext = getFileExtension($old_name);
        $new_name = uniqid("img", true) . "." . $ext;
        //dd($old_name, $ext, $new_name);
        if ($_FILES["image"]["size"] > (100 * 1024 * 1024)) {
            echo "le fichier est trop grand";
        } else if 
            ($ext != "png" || $ext != "PNG" || $ext != "jpg" || $ext != "jpeg" || $ext != "JPEG" || $ext != "JPG") {
                echo " le format n'est pas valide"; 
            }
        }
        move_uploaded_file($_FILES["image"]["tmp_name"], "public/asset/" . $_FILES["image"]["name"]);
       /*  dd($_FILES); */

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