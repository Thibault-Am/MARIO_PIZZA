<?php

namespace classes\liste;

class PizzaioloDisplay extends AbstractDisplay{

    public function displayMenu(){
        

        echo "\n
        - [s]ee commands.\n
        - [q]uit\n";
        
        
        
    }
    public function displayAddPizza(){
      
     
        echo "create a pizza:\n
        name pizza:";
        
        
    }
    public function displayAddIngredient(){
       
        
        echo "add a ingredient:\n
        ingredient name:";
        
        
    }

  
}