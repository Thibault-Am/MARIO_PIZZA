<?php
namespace classes\liste;

class Price {
    public $pizza; // name of pizzas
    public $price;
    public $tab_price=[];

    public function __construct($pizza,$price){
        
        $this->pizza=$pizza;
        $this->price=$price;
        $this->tab_price=[$pizza=>$price];
    }

    public function displayAllPrice(){ //function display list of all pizza
        foreach($this->tab_price as $nameL => $priceL){
            return "Name : ".$nameL."   Price : ".$priceL."\n"; 
        }
    }
    public function getPrice($name_pizza){ //function display list of all pizza
        foreach($this->tab_price as $nameL => $priceL){
            if ($nameL==$name_pizza){
                return $priceL; 
            }
        }
    }
    //public function changeName()

}




