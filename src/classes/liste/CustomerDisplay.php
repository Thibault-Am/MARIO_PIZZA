<?php

namespace classes\liste;

class CustomerDisplay extends AbstractDisplay{

    public function displayMenu(){
        

        echo "\n
        - [p]izza.\n
        - [m]odify a pizza.\n
        - [c]reate your own pizza.\n
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