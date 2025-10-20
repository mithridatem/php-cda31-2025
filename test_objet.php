<?php

include 'vendor/autoload.php';

//import de la classe Maison
use App\Maison;
use App\Vehicule;
//Instancier des objets Maison
$villa = new Maison("Villa", 14.20, 8.59);
$immeuble = new Maison("Immeuble", 30.50, 18.42, 8);

//Appel de la méthode surface
echo "<p>la surface de " . $villa->getNom() . " est égale à : " . round($villa->surface(),2) . " m2</p>";
echo "<p>la surface de " . $immeuble->getNom() . " est égale à : " . round($immeuble->surface(),2) . " m2</p>";

//instancier des Vehicules
$voiture = new Vehicule("Mercedes CLK", 4, 250);
$moto = new Vehicule("Honda CBR", 2, 280);
$camion = new Vehicule("Truck", 8, 130);

//Afficher les vehicules 
echo "<p>Le vehicule : " . $voiture->getNom() . " est de type : " . $voiture->detect() . "</p>";
echo "<p>Le vehicule : " . $moto->getNom() . " est de type : " . $moto->detect() . "</p>";
echo "<p>Le vehicule : " . $camion->getNom() . " est de type : " . $camion->detect() . "</p>";

//Appel de la méthode boost
$voiture->boost();

//Affichage de la nouvelle vitesse
echo "<p>Le vehicule " . $voiture->getNom() . " à une nouvelle vitesse " . $voiture->getVitesse() . " km/h</p>";

//affichage des vehicules les plus rapides
echo "<p>" . $voiture->plusRapide($moto) . "</p>";
$moto->boost();
echo "<p>" . $moto->plusRapide($voiture) . "</p>";
echo "<p>" . $camion->plusRapide($moto) . "</p>";