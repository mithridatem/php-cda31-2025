<?php 

class Cercle extends Forme
{
    /**
     * Attributs
     */
    private float $rayon;
    /**
     * Constructeur
     */
    public function __construct(float $rayon, string $backgroundColor)
    {
        $this->rayon = $rayon;
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * Méthodes implémentées
     */

    public function surface(): float
    {
        return pi() * $this->rayon * $this->rayon;
    }


    public function perimetre(): float
    {
        return 2 * pi() * $this->rayon;
    }

    //Redéfinition (logique) @Override
    public function afficher():void{
        echo  "Classe de type : " . self::class;
    }

}