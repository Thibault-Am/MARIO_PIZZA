<?php

namespace classes\liste;

class AdminDisplay extends AbstractDisplay{

    public function displayMenu(){
        

            echo "**Menu admin**\n
            - [p]izza list.\n
            - [i]ngredients list\n
            - [q]uit\n";
        
        
        
    }
    public function displayAddPizza(){
      

            echo "add a pizza:\n";
           echo" new pizza:";
        
        
    }
    public function displayAddIngredient(){
       

            echo "add a ingredient:\n";
            echo " new ingredient:";

        
    }
    public function displayAdminIngredientMenu() {
        echo "Do you want : \n
        -[a]dd an ingredient\n
        -[u]pdate an ingredient\n
        -[d]elete an ingredient\n
        -[s]earch an ingredient\n
        -[n]othing\n";
       
    }
    function displayAdminPizzaMenu(){
        echo "Do you want : \n
        -[a]dd a pizza\n
        -[u]pdate a pizza\n
        -[d]elete a pizza\n
        -[s]earch a pizza\n
        -[p]rice update\n
        -[n]othing\n";
        
    }
}