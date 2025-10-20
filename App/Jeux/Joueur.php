<?php

namespace App\Jeux;

use App\Jeux\Des;

class Joueur
{
    //Attributs
    private string $nom;
    private int $valeurLance;
    private Des $des;

    //Constructeur
    public function __construct(string $nom, Des $des)
    {
        $this->nom = $nom;
        $this->des = $des;
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

    public function getValeurLance(): int
    {
        return $this->valeurLance;
    }

    public function setValeurLance(int $valeurLance): void
    {
        $this->valeurLance = $valeurLance;
    }

    public function getDes(): Des
    {
        return $this->des;
    }

    public function setDes(Des $des): void
    {
        $this->des = $des;
    }

    //Méthode lancer (Des)
    public function lancerDes(): int
    {
        $this->valeurLance = $this->des->lancer();
        return $this->valeurLance;
    }
}