<?php

include 'vendor/autoload.php';

use App\Maison;

//Instance d'une Maison
$villa = new Maison("Villa", 10,12);
//appel de la fonction surface et affichage du nom
echo "<p>La maison : " . $villa->getNom() . " à une surface de : " . $villa->surface() . "</p>";

//Instance d'une Maison avec des étages
$immeuble = new Maison("Immeuble", 22.5,36.7, 8);
//appel de la fonction surface et affichage du nom
echo "<p>La maison : " . $immeuble->getNom() . " à une surface de : " . $immeuble->surface() . "</p>";
