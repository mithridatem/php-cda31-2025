<?php

namespace App\Jeux;

class Des
{
    //Attributs
    private int $nbrFace;
    private int $score;

    //Constructeur
    public function __construct(int $nbrFace = 6)
    {
        $this->nbrFace = $nbrFace;
    }

    //Getters et Setters
    public function getNbrFace(): int 
    {
        return $this->nbrFace;
    }

    public function setNbrFace(int $nbrFace) 
    {
        $this->nbrFace = $nbrFace;
    }

    public function getScore(): int 
    {
        return $this->score;
    }

    public function setScore(int $score): void 
    {
        $this->score = $score;
    }

    //Méthode
    public function lancer(): int 
    {
        $this->score = rand(1, $this->nbrFace);
        return $this->score;
    }
}
