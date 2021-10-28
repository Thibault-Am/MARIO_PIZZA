<?php

namespace classes\users;

class Customer extends User {
    public $role = "customer";
    public $money;
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
    public function setMoney($sum){
        
           $this->money=$sum;
        
        
    }
    public function getMoney(){
        
        return $this->money;
     
 }
}