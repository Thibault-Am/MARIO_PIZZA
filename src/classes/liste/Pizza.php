<?php
namespace classes\liste;

class Pizza {
    public $name; // name of pizzas
    public $pizza=[];
    public $tabIng;

    public function __construct($name,$tabIng){
        $this->name=$name;
        $this->pizza=[$name=>$tabIng];
        $this->tabIng=$tabIng;
    }

    public function pizzaList(){ //function display list of all pizza
        foreach($this->pizza as $name=>$ingredient){
        
            $result = "Pizza :".$name."\n";
        
            foreach($this->tabIng as $ingredient){
                $result=$result."  Ingredients :".$ingredient."\n";
            }
            return $result;
        
        }
        
    }
    public function pizzaSearch($search_name){// function display a pizza whith a specific name
        
        foreach($this->pizza as $name=>$ingredient){
            if($search_name==$name){
                $result = "Pizza :".$name."\n";
            
                foreach($this->tabIng as $ingredient){
                    $result=$result."  Ingredients :".$ingredient."\n";
                }
                return $result;
            }
           
        }
        
        
    }
    public function arrayIng($search_name){// function display a pizza whith a specific name
        
        foreach($this->pizza as $name=>$ingredient){
            if($search_name==$name){           
               
                return $this->tabIng;
            }
           
        }
        
        
    }
    public function pizzaUpdateName($newName){//function to update name of a pizza
        $this->name=$newName;
    }
    public function addPizza($name,$ingredients){// function to add a pizza
        $this->pizza=[$name=>$ingredients];
        $this->tabIng=$ingredients;
        
    }
    public function __get($name){//function to return the name and array with ing of a pizza
        return $this->name.$this->pizza;
    }

}




