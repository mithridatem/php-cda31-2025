<?php

//Import de l'autoload
include 'vendor/autoload.php';

//Import des classes
use App\Jeux\Des;
use App\Jeux\Joueur;
use App\Jeux\Partie;

//Instance des objets
$des1 = new Des(6);
$des2 = new Des(6);
$joueur1 = new Joueur("Jean", $des1);
$joueur2 = new Joueur("Marie", $des2);
$partie = new Partie($joueur1,$joueur2, 6);

echo $partie->lancerPartie();