<?php

namespace classes\liste;

class Command {
    public $name;// name of pizza
    public $price;// pirce of pizza
    public $customer;
    public $tab_ing=[];
    public $tab_command=[];

    public function __construct($name, $price,$customer){
        $this->name=$name;
        $this->price=$price;
        $this->customer=$customer;
        $this->tab_command[$customer]=[$name=>$price];
    }
    
    public function displayCommand(){
        
    return "Name : ".$this->name."\n"; //display the command name + price
        
    }
    
    public function customMadePizza($tab_ing){
        
        $this->tab_ing=$tab_ing;//implement a variable with a array of ingredient
            
    }
    public function tabIngredient(){
        $result="";
        foreach($this->tab_ing as $ingredient){
        
            $result =$result."  Ingredients :".$ingredient."\n";//return the list on Ingredient in the command
        
            
        
        }
        return $result;
    }
    public function getCustomer(){

        return "Customer : ".$this->customer;//return the customer of the command

    }
    public function getName(){

        return $this->name;//return the customer of the command

    }
}   