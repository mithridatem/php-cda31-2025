<?php

include 'Forme.php';
include 'Carre.php';
include 'Cercle.php';
include '../vendor/autoload.php';
$cercle = new Cercle(2.5, "red");
$carre = new Carre("bleu", 4.2, 4.90);

dump($carre->afficher());
dump($cercle->afficher());

dd($cercle->surface(), $carre->surface());
