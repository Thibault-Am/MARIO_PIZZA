<?php

namespace classes\users;

abstract class User{
    public $firstname;
    public $lastname;

    public function __construct($lastname, $firstname){
        $this->lastname=$lastname;
        $this->firstname=$firstname;
    }

    public function afficher(){
        return $this->lastname;
    }

    abstract public function __toString():string;

    public function __get($lastname){
        if (property_exists($this, $lastname)){
            return $this->$lastname;
          }else{
            throw new Exception ('Une erreur est survenue sur le Get');
          } 
    }
    public function __set($lastname,$newLastname){
        if (property_exists($this, $lastname)){
          $this->$lastname = $newLastname;
        }else{
          throw new Exception ('Une erreur est survenue sur le Set');
        }
       
      }
} 