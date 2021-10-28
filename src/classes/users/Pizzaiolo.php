<?php

namespace classes\users;

class Pizzaiolo extends User {
    public $login;
    public $password;
    public $role = "pizzaiolo";
    

    public function __construct($lastname, $firstname){
        parent::__construct($lastname, $firstname);
    }

    
}