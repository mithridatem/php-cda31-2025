<?php

namespace App\Perso;


class Assassin extends Personnage
{   
    //Attributs
    private int $bonusAttaque;

    //Constructeur
    public function __construct(
        string $nom,
        int $vie,
        int $attaque, 
        int $defense, 
        int $bonusAttaque
    )
    {
        parent::__construct($nom,$vie, $attaque, $defense);
        $this->bonusAttaque = $bonusAttaque;
    }

    //Getters et setters
    public function getBonusAttaque(): int
    {
        return $this->bonusAttaque;
    }

    public function setBonusAttaque(int $bonusAttaque): void 
    {
        $this->bonusAttaque = $bonusAttaque;
    }

    //Méthode attaquer redéfinie
    public function attaquer(Personnage $cible): void 
    {
        
        if ($this->getAttaque() > $cible->getDefense()) {
            //rappele la logique de attaquer du parent
            parent::attaquer($cible);
            //Lance mon critique (5%)
            if ($this->randomFive() <= 5) {
                //Enlever Bonus attaque
                $cible->setVie($cible->getVie() - $this->bonusAttaque); 
            }
        }
    }
}
