<?php

abstract class Forme
{
    /**
     * Attributs
     */
    public string $backgroundColor;

    /**
     * Méthodes abstraite
     */
    abstract public function perimetre():float; 
    abstract public function surface():float; 

    /**
     * Méthodes concraites
     */
    public function afficher():void {
        echo "Forme : " . $this::class;
    }
}