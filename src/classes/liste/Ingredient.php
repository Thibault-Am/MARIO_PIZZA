<?php

namespace classes\liste;

class Ingredient {
    public $type;// name of ingredients
    public $amount;// amount of ingredients
    public $tabIng;// array of name=>amount
    
    public function __construct($type, $amount){
        $this->type=$type;
        $this->amount=$amount;
        $this->tabIng=[$type=>$amount];
    }
    
    public function ingredientsList(){
        
        foreach($this->tabIng as $nameL => $amountL){
            return "Name : ".$nameL."   Amount : ".$amountL."\n"; //return a list of ingredient
        }
    }
    public function ingredientSearch($search_name){
        foreach($this->tabIng as $type=>$amount){
            if($search_name==$type){
                $result = "Ingredient :".$type." Amount : $amount\n";//return one ingredient specific
                return $result;
            }
           
        }
    }
    //abstract protected function afficherIngredient();

}