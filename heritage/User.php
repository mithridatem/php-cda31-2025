<?php

class User
{
    private int $id;
    private string $email;
    private string $password;
    protected string $pseudo;
    
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->id = 2;
    }
}