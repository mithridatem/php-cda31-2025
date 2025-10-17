<?php

namespace App;

class Maison
{
    /**
     * Attributs
     */
    private string $nom;
    private float $largeur;
    private float $longueur;
    private int $nbrEtage;
    /**
     * Constructeur
     */
    public function __construct(
        string $nom,
        float $largeur,
        float $longueur,
        int $nbrEtage = 1
    )
    {
        $this->nom = $nom;
        $this->largeur = $largeur;
        $this->longueur = $longueur;
        $this->nbrEtage = $nbrEtage;
    }
  
    /**
     * Getters et Setters
     */
    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function getLongueur() : float {
        return $this->longueur;
    }

    public function setLongueur(float $longueur) {
        $this->longueur;
    }

    public function getNbrEtage() : int {
        return $this->nbrEtage;
    }

    public function setNbrEtage(int $nbrEtage) {
        $this->nbrEtage;
    }

    /**
     * Méthodes
     */
    public function surface(): float {
        return $this->longueur * $this->largeur * $this->nbrEtage;
    }

    public function __toString(): string
    {
        return "La maison est : " . $this->nom;
    }



}
