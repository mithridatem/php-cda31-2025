<?php

namespace App\Perso;

class Partie
{
    //Attributs
    private Personnage $perso1;
    private Personnage $perso2;
    private int $nbrTour;

    //Constructeur
    public function __construct(
        Personnage $perso1,
        Personnage $perso2,
        int $nbrTour
    )
    {
        $this->perso1 = $perso1;
        $this->perso2 = $perso2;
        $this->nbrTour = $nbrTour;
    }

    //Getters et Setters
    public function getPerso1(): Personnage
    {
        return $this->perso1;
    }

    public function setPerso1(Personnage $personnage): void
    {
        $this->perso1 = $personnage;
    }

    public function getPerso2(): Personnage
    {
        return $this->perso2;
    }

    public function setPerso2(Personnage $personnage): void
    {
        $this->perso2 = $personnage;
    }

    public function getNbrTour(): int 
    {
        return $this->nbrTour;
    }

    public function setNbrTour(int $nbrTour): void
    {
        $this->nbrTour = $nbrTour;
    }

    //Méthodes
    public function lancerPartie(): string
    {
        //répeter la logique de combat autant que le nombre de tour
        for ($i=0; $i < $this->nbrTour; $i++) {
            //Lancer les attaques des 2 personnages
            $this->perso1->attaquer($this->perso2);
            $this->perso2->attaquer($this->perso1);

            //test si perso1 à perdu tout ces points de vie
            if ($this->perso1->getVie() <= 0) {
                $i = $this->nbrTour;
            }
            //test si perso2 à perdu tout ces points de vie
            if ($this->perso2->getVie() <= 0) {
                $i = $this->nbrTour;
            }
        }

        //Test des conditions de victoires
        //Test si perso2 à gagné
        if ($this->perso1->getVie() <= 0 && $this->perso2->getVie() > 0) {
            return $this->perso2->getNom() . " a gagné";
        }

        //Test si perso1 à gagné
        if ($this->perso2->getVie() <= 0 && $this->perso1->getVie() > 0) {
            return $this->perso1->getNom() . " a gagné";
        }

        //Test égalité
        if ($this->perso1->getVie() > 0 && $this->perso2->getVie() > 0) {
            return "Egalité";
        }

        return "Les 2 personnnages ont perdu";
    }
}
