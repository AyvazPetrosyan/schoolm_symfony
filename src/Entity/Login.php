<?php

namespace App\Entity;

class Login implements \Symfony\Component\Security\Core\User\UserInterface
{
    public function getRoles(){
        return 1;
    }

    public function getPassword(){
        return 'admin';
    }

    public function getSalt(){
        return true;
    }

    public function getUsername(){
        return 'admin';
    }

    public function eraseCredentials(){
        return true;
    }
}