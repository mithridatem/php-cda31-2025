<?php

include 'vendor/autoload.php';

//Import des dépendance

use App\Perso\Assassin;
use App\Perso\Guerrier;
use App\Perso\Partie;

//Instance des Personnages
$jefff = new Assassin("Jefff", 20, 8, 3, 5);
$thomas = new Guerrier("Thomas",40, 25, 6, 3);
$partie = new Partie($jefff,$thomas, 5);

//Lancer la partie
echo $partie->lancerPartie();