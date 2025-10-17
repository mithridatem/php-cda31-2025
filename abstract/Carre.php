<?php

class Carre extends Forme{
    /**
     * Attributs
     */
    private float $longueur;
    private float $largeur;

    /**
     * Constructeur
     */
    public function __construct(string $backgroundColor, float $longeur, float $largeur)
    {
        $this->backgroundColor = $backgroundColor;
        $this->largeur = $largeur;
        $this->longueur = $longeur;
    }


    /**
     * Méthodes implementées
     */

    public function perimetre(): float
    {
        return ($this->longueur * 2) + ($this->largeur * 2);
    }

    public function surface(): float
    {
        return $this->largeur * $this->longueur;
    }
}