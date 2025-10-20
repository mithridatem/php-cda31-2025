<?php

namespace App\Jeux;

use App\Jeux\Joueur;

class Partie
{
    //Attributs
    private Joueur $joueur1;
    private Joueur $joueur2;
    private int $nbrTour;
    private int $scoreJ1;
    private int $scoreJ2;

    //Constructeur
    public function __construct(
        Joueur $joueur1,
        Joueur $joueur2,
        int $nbrTour
    )
    {
        $this->joueur1 = $joueur1;
        $this->joueur2 = $joueur2;
        $this->nbrTour = $nbrTour;
        $this->scoreJ1 = 0;
        $this->scoreJ2 = 0;
    }

    //Getter et setter 
    public function getJoueur1(): Joueur
    {
        return $this->joueur1;
    }

    public function setJoueur1(Joueur $joueur1): void
    {
        $this->joueur1 = $joueur1;
    }

    public function getJoueur2(): Joueur
    {
        return $this->joueur2;
    }

    public function setJoueur2(Joueur $joueur2): void
    {
        $this->joueur2 = $joueur2;
    }

    public function getNbrTour(): int
    {
        return $this->nbrTour;
    }

    public function setNbrTour(int $nbrTour): void
    {
        $this->nbrTour = $nbrTour;
    }

    public function getScoreJ1(): int
    {
        return $this->scoreJ1;
    }

    public function setScoreJ1(int $scoreJ1): void
    {
        $this->scoreJ1 = $scoreJ1;
    }

     public function getScoreJ2(): int
    {
        return $this->scoreJ2;
    }

    public function setScoreJ2(int $scoreJ2): void
    {
        $this->scoreJ2 = $scoreJ2;
    }

    //Méthodes
    //Méthode pour lancer la partie
    public function lancerPartie(): string
    {
        //Boucle pour iterer sur le nombre de tour
        for ($i = 0; $i < $this->nbrTour; $i++) {
            //Lancer le dés pour chaque joueur
            $this->joueur1->lancerDes();
            $this->joueur2->lancerDes();
            
            echo "<p>valeur lancé de J1 " . $this->joueur1->getValeurLance() . "</p>";
            echo "<p>valeur lancé de J2 " . $this->joueur2->getValeurLance() . "</p>" ;

            //tester si Joueur1 à fait un lancer plus haut que Joueur2
            if ($this->joueur1->getValeurLance() > $this->joueur2->getValeurLance()) {
                
                $this->scoreJ1 += 2;
            }
            //tester si Joueur2 à fait un lancer plus haut que Joueur1
            if ($this->joueur1->getValeurLance() < $this->joueur2->getValeurLance()) {
                $this->scoreJ2 += 2;
            }
            //Test si Joueur1 à un lancé égal à Joueur2
            if ($this->joueur1->getValeurLance() == $this->joueur2->getValeurLance()) {
                $this->scoreJ1++;
                $this->scoreJ2++;
            }
        }
        //Conditions de victoire
        //Test Joueur1 gagnant
        if ($this->scoreJ1 > $this->scoreJ2) {
            return "<p>Le gagant est : " . $this->joueur1->getNom() . " avec un score de : " .$this->scoreJ1 . " contre : " . $this->scoreJ2 . "</p>";
        }
        //Test Joueur2 gagnant
        if ($this->scoreJ1 < $this->scoreJ2) {
            return "<p>Le gagant est : " . $this->joueur2->getNom() . " avec un score de : " .$this->scoreJ2. " contre : " . $this->scoreJ1 . "</p>";
        }
        //Egalité
        return "<p>Egalité les joueurs ont un score de : " . $this->scoreJ1 . " chacun</p>";
    }
}