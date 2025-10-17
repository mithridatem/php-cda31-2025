<?php
//importer les dépendances 
include 'vendor/autoload.php';

//Import des classes
use App\Exemple;

//instance des Objets instances
$instance = new Exemple("test");
$instance2 = new Exemple("test2");
$instance3 = new Exemple("test3");
//dump des 3 objets Exemple
dump($instance, $instance2, $instance3);