<?php

namespace App;

class Exemple
{
    /**
     * Attributs 
     */
    private ?string $title;
    /**
     * Constructeur
     */
    public function __construct(string|null $title)
    {
        $this->title = $title;
    }

    /**Getters and Setters
     */
    public function getTitle(): ?string 
    {
        return $this->title;
    }

    public function setTitle(?string $title): void 
    {
        $this->title = $title;
    }

    
    /**
     * Méthodes
     */
    public function __toString(): string
    {
        return "Ma classe : " . self::class; 
    }
}