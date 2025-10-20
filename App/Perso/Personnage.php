<?php

namespace App\Perso;

class Personnage
{
    //Attributs
    private string $nom;
    private int $vie;
    private int $attaque;
    private int $defense;

    //Constructeur
    public function __construct(
        string $nom,
        int $vie,
        int $attaque,
        int $defense
    )
    {
        $this->nom = $nom;
        $this->vie = $vie;
        $this->attaque = $attaque;
        $this->defense = $defense;
    }

    //Getter et setters
    public function getNom(): string
    {
        return $this->nom;
    }
    public function getVie(): int
    {
        return $this->vie;
    }
    public function getAttaque(): int
    {
        return $this->attaque;
    }
    public function getDefense(): int
    {
        return $this->defense;
    }
    
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setVie(int $vie): void
    {
        $this->vie = $vie;
    }

    public function setAttaque(int $attaque): void
    {
        $this->attaque = $attaque;
    }

    public function setDefense(int $defense): void
    {
        $this->defense = $defense;
    }

    //Méthodes
    public function attaquer(Personnage $cible): void 
    {
        if ($this->attaque > $cible->defense) {
            $cible->vie -= ($this->attaque - $cible->defense); 
        }
    }

    protected function randomFive(): int {
        return rand(1, 100);
    }  
}
