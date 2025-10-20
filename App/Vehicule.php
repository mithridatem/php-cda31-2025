<?php

namespace App;

class Vehicule
{
    //Attributs
    private string $nom;
    private int $nbrRoue;
    private int|float $vitesse;

    //constructeur
    public function __construct(
        string $nom,
        int $nbrRoue,
        int|float $vitesse
    )
    {
        $this->nom = $nom;
        $this->nbrRoue = $nbrRoue;
        $this->vitesse = $vitesse;
    }

    //Getters et Setters
    public function getNom(): string 
    {
        return $this->nom;
    }

    public function setNom(string $nom): void 
    {
        $this->nom = $nom;
    }

    public function getNbrRroue(): int 
    {
        return $this->nbrRoue;
    }

    public function setNbrRoue(int $nbrRoue): void 
    {
        $this->nbrRoue = $nbrRoue;
    }

    public function getVitesse(): int|float 
    {
        return $this->vitesse;
    }

    public function setVitesse(int|float $vitesse): void 
    {
        $this->vitesse = $vitesse;
    }

    //Méthodes
    //Méthode qui retourne le type de véhicule en fonction de son nbrRoue
    public function detect(): string 
    {
        if ($this->nbrRoue == 2) {
            return "Moto";
        }
        if ($this->nbrRoue == 4) {
            return "Voiture";
        }
        return "Autre";
    }

    //Méthode qui va ajouter + 50 à la vitesse courante
    public function boost(): void
    {
        $this->vitesse += 50;
    }

    //Alternative avec un paramètre
    public function boostV2(int $boost): void
    {
        $this->vitesse += $boost;
    }

    //Méthode qui retourne le vehicule le plus rapide ou les 2 vehicules
    public function plusRapide(Vehicule $vehicule): string 
    {
        //test si le Vehicule courante est le plus rapide
        if ($this->vitesse > $vehicule->vitesse) {
            return "Le vehicule : " . $this->nom . " est le plus rapide";
        }

        //test si le Vehicule en paramètre est le plus rapide
        if ($vehicule->vitesse > $this->vitesse) {
            return "Le vehicule : " . $vehicule->nom . " est le plus rapide";
        }

        return "Les vehicules : " . $this->nom  . " et : " . $vehicule->nom  . " vont à la même vitesse : " . $this->vitesse;
    }
}