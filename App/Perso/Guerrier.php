<?php

namespace App\Perso;

class Guerrier extends Personnage
{   
    //Attributs
    private int $bonusDefense;

    //Constructeur
    public function __construct(
        string $nom,
        int $vie,
        int $attaque, 
        int $defense, 
        int $bonusDefense
    )
    {
        parent::__construct($nom,$vie, $attaque, $defense);
        $this->bonusDefense = $bonusDefense;
    }

    //Getters et setters
    public function getBonusDefense(): int
    {
        return $this->bonusDefense;
    }

    public function setBonusDefense(int $bonusDefense): void 
    {
        $this->bonusDefense = $bonusDefense;
    }

    //Méthode attaquer redéfinie
    public function attaquer(Personnage $cible): void 
    {
        //Rappeler la logique de attaquer du parent
        parent::attaquer($cible);
        if ($this->getAttaque() > $cible->getDefense()) {
            //Lance mon critique (5%)
            if ($this->randomFive() < 5) {
                //ajout de points de vie attaquant ($this)
                $this->setVie($this->getVie() + $this->bonusDefense);
            }
        }
    }
}