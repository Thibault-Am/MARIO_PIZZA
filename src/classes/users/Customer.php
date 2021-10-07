<?php

namespace classes\users;

class Customer extends User {
    public $role = "customer";

    public function __construct($lastname, $firstname){
        parent::__construct($lastname, $firstname);
    }

    public function __toString(): string{
        {
            $response="{\"LastName\" : \"$this->lastname\",
FirstName\" : \"$this->firstname\",";
            return $response;
        }
    }
}