<?php

class Admin extends User
{
    private int $tel;

    public function __construct(string $email , string $password, int $tel)
    {
        parent::__construct($email,$password);
        $this->tel = $tel;
  
    }

}