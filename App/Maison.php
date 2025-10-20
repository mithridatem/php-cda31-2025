<?php

namespace App;

class Maison
{
    //Attributs
    private string $nom;
    private float $longueur;
    private float $largeur;
    private int $nbrEtage;

    //Constructeur
    public function __construct(
        string $nom,
        float $longueur,
        float $largeur,
        int $nbrEtage = 1,
        )
    {
        $this->nom = $nom;
        $this->longueur = $longueur;
        $this->largeur = $largeur;
        $this->nbrEtage = $nbrEtage;
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

    public function getLongueur(): float 
    {
        return $this->longueur;
    }

    public function setLongueur(float $longueur): void
    {
        $this->longueur = $longueur;
    }

    public function getLargeur(): float 
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): void 
    {
        $this->largeur = $largeur;
    }

    //Méthodes
    public function surface(): float 
    {
        return $this->largeur * $this->longueur * $this->nbrEtage;
    }
}
