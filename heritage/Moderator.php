<?php

class Moderator extends User
{
    public function __construct(string $email, string $password, string $pseudo)
    {
        parent::__construct($email, $password);
        $this->pseudo = $pseudo;
    }
}