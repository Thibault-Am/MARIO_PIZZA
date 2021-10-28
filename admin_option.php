<?php
require_once 'src/loader/utils/AbstractClassLoader.php';
require_once 'src/loader/utils/ClassLoader.php';
require_once 'loader.php';

$loader = new \loader\utils\ClassLoader('src');
$loader->register();

use classes\users\Admin;
use classes\liste\Pizza;
use classes\liste\Ingredient;
use classes\liste\Price;
use classes\liste\AdminDisplay;



function menuAdmin($pizzas,$ingredients,$prices){
    $adminDisplay=new AdminDisplay;
    echo "\nYou are an Admin.\n";


    $adminDisplay->displayMenu();//function displayAdminMenu in file: menus_admin.php

    
    echo "\nAdmin want to see the pizza list :\n\n";
    foreach($pizzas as $name => $ingr){//for each row in the array pizza
        $pizza = new Pizza($name,$ingr);//create an instance
        echo $pizza->pizzaList();/// call to function pizzaList from the class Pizza show the list of pizza name : array(ingredients)
    }
    $adminDisplay->displayAdminPizzaMenu();//function displayAdminPizzaMenu in file: menus_admin.php
    echo "Admin chose to add a pizza.\n\n";
    
    $adminDisplay->displayAddPizza();//function displayAddPizza in file: menus_admin.php
    $name="USA Pizza";
    echo "The admin create the $name \n\n";
    $arrayIng=[];//array of ingredient 
    echo "Ingredients list: \n\n";//list of ingredient//
    foreach($ingredients as $ingr=>$amount){//for each row from the array ingredients 
        $ingredient=new Ingredient($ingr,$amount);//create an instance 
        echo $ingredient->ingredientsList();// call the function ingredientsList from the class Ingredient 
    }
    
    $ingredient1="pizza_dough";
    $ingredient2="tomato_sauce";
    $ingredient3="chorizo";
    $ingredient4="cheddar";
    $ingredient5="Comté_cheese";
    echo "\nIngredients on the new pizza:\n $ingredient1 \n $ingredient2 \n $ingredient3 \n $ingredient4 \n $ingredient5 \n\n";
    array_push($arrayIng,$ingredient1);//push the ingredient in the array of ingredient create before
    array_push($arrayIng,$ingredient2);//push the ingredient in the array of ingredient create before
    array_push($arrayIng,$ingredient3);//push the ingredient in the array of ingredient create before
    array_push($arrayIng,$ingredient4);//push the ingredient in the array of ingredient create before
    array_push($arrayIng,$ingredient5);//push the ingredient in the array of ingredient create before     
    $add_pizza_price=13.50;               
    echo "The admin set the price for the $name at 13.50.\n\n";
    $prices=$prices+[$name=>$add_pizza_price];//add a price to array prices
    $pizzas[$name]=$arrayIng;//add a pizza with ingredient to array pizza
    echo "Pizza list after add option:\n\n";
    foreach($pizzas as $name => $ingr){//for each row in the array pizza
        $pizza = new Pizza($name,$ingr);//create an instance
        echo $pizza->pizzaList();/// call to function pizzaList from the class Pizza show the list of pizza name : array(ingredients)
    }
    ///////////////////UPDATE////////////////////////////////////
    
    $name_update="vegan";
    echo "\nAdmin update the pizza : $name_update\n\n";
    $arrayIng=[];//array of ingredient for the pizza
    $test_exist=0;
    foreach($pizzas as $pizza=>$ingr){//for each row in array pizza 
        $pizza= new Pizza($pizza,$ingr);//create an instance of pizza
        $pizza->pizzaSearch($name_update);//call function pizzaSearch from the class Pizza with the name of pizza you want update as parametre
        if($pizza->pizzaSearch($name_update)==true){//try if your pizza exist
            $test_exist=1;
        }
    }
    if($test_exist==0){//if pizza doesnt exist show a message
        echo "pizza $name_update doesn't exist\n";
    }else{
        $new_name="vegie";
        echo "Updated name : $new_name\n\n";
        $ingredient1_up="pizza_dough";
        $ingredient2_up="salad";
        $ingredient3_up="tomato";
        $ingredient4_up="onion";
        $ingredient5_up="pineapple";
        echo "\nIngredients on the updated pizza:\n $ingredient1_up \n $ingredient2_up \n $ingredient3_up \n $ingredient4_up \n $ingredient5_up \n\n";

        array_push($arrayIng,$ingredient1);//push the ingredient in the array of ingredient create before
        array_push($arrayIng,$ingredient2);//push the ingredient in the array of ingredient create before
        array_push($arrayIng,$ingredient3);//push the ingredient in the array of ingredient create before
        array_push($arrayIng,$ingredient4);//push the ingredient in the array of ingredient create before
        array_push($arrayIng,$ingredient5);//push the ingredient in the array of ingredient create before   
        
        unset($pizzas[$name_update]);   //delete of the current pizza
        $pizzas[$new_name]=$arrayIng;//add the new pizza, ingredient
        
    }
    echo "Pizza list after update option:\n\n";
    foreach($pizzas as $name => $ingr){//for each row in the array pizza
        $pizza = new Pizza($name,$ingr);//create an instance
        echo $pizza->pizzaList();/// call to function pizzaList from the class Pizza show the list of pizza name : array(ingredients)
    }
    ////////////////////////DELETE//////////////////

    $delete_pizza="hawaiian";
    echo "\nAdmin delete the pizza $delete_pizza \n\n";        
    unset($pizzas[$delete_pizza]); 
    unset($prices[$delete_pizza]); 
        
    echo "Pizza list after delete option:\n\n";
    foreach($pizzas as $name => $ingr){//for each row in the array pizza
        $pizza = new Pizza($name,$ingr);//create an instance
        echo $pizza->pizzaList();/// call to function pizzaList from the class Pizza show the list of pizza name : array(ingredients)
    }      
    /////////////////////////SEARCH////////////////////

    $pizza_name="margherita";
    echo "\nThe admin search the $pizza_name. \n\n";

    foreach($pizzas as $pizza=>$ingr){
        $pizza= new Pizza($pizza,$ingr);
        echo $pizza->pizzaSearch($pizza_name);
    }
    //////////////////////////UPDATE A PRICE FOR PIZZA/////////////////
    echo "\nPizza + price :\n\n";
    foreach($prices as $pizza=>$price){
        $the_price= new Price($pizza,$price);
        echo $the_price->displayAllPrice();//function displayAllPrice from the class Price show a list of all pizza : price
    }
    $pizza_name="margherita";
    $new_price=9.50;
    echo "\nThe admin want to update the price of the pizza $pizza_name to $new_price \n\n";
    $prices[$pizza_name]=$new_price;
    echo "Pizza list after update price option:\n\n";
    foreach($prices as $pizza=>$price){
        $the_price= new Price($pizza,$price);
        echo $the_price->displayAllPrice();//function displayAllPrice from the class Price show a list of all pizza : price
    }
    

    ////////////////INGREDIENT LIST//////////////////////////////////

        echo "\nAdmin want to see the ingredient list\n\n";
        foreach($ingredients as $name=>$amount){//for each row in the array ingredients 
            $ingredient= new Ingredient($name,$amount);//new Instance of Ingredient whith the ingredient name and the amount of the ingredient
            echo $ingredient->ingredientsList();//function ingredientsList from the class Ingredient show a list of all ingredients 
        }
        /////////////ADD///////////////////////

        $adminDisplay->displayAdminIngredientMenu();//function displayAdminIngredientMenu in file: menus_admin.php
        $name = "Salmon";
        $amount = 10;
        $adminDisplay->displayAddIngredient();//function displayAddIngredient in file: menus_admin.php
        echo "\nThe admin add a new ingredient :$name => $amount\n";
        $ingredients+=[$name=>$amount];//add a new row in the tab ingredients with the name and amount written before
        echo "\nIngredient list after add option\n\n";
        foreach($ingredients as $name=>$amount){//for each row in the array ingredients 
            $ingredient= new Ingredient($name,$amount);//new Instance of Ingredient whith the ingredient name and the amount of the ingredient
            echo $ingredient->ingredientsList();//function ingredientsList from the class Ingredient show a list of all ingredients 
        }
            ////////////////////////////UPDATE///////////////////////////////               
        $update_ingredient="chicken";
        echo "\nThe admin want to update $update_ingredient\n\n";

        $test_exist=0;
        foreach($ingredients as $name=>$amount){//for each name from the array ingredients 
            $ingredient= new Ingredient($name,$amount);//create an instance of ingredient
            $ingredient->ingredientSearch($update_ingredient);//call to function ingredientSearch in class Ingredient with the name of ingredient you want to update to verify if it exist
            if($ingredient->ingredientSearch($update_ingredient)==true){
                $test_exist=1;//if exist then update $test_exist to 1
            }
        }
        if($test_exist==0){//if $test_exist value is 0 then the ingredient you want update doesnt exist  
            echo "ingredient $update_ingredient doesn't exist\n";
        }else{//the ingredient you want update exist  
            $new_name="chick";
            $new_amount=53;
            echo "\nThe admin updated $update_ingredient to $new_name with the amount of $new_amount\n\n";
            unset($ingredients[$update_ingredient]);   //delete of the current ingredient
            $ingredients+=[$new_name=>$new_amount];//add the new ingredient=>amount
            
        }
        echo "\nIngredient list after update option\n\n";
        foreach($ingredients as $name=>$amount){//for each row in the array ingredients 
            $ingredient= new Ingredient($name,$amount);//new Instance of Ingredient whith the ingredient name and the amount of the ingredient
            echo $ingredient->ingredientsList();//function ingredientsList from the class Ingredient show a list of all ingredients 
        }
        //////////////////////DELETE//////////////////////////////

        $delete_ingredient="red_peppers";
        echo "\nThe admin want to delete $delete_ingredient.\n";
        unset($ingredients[$delete_ingredient]); 
        echo "\nIngredient list after delete option\n\n";
        foreach($ingredients as $name=>$amount){//for each row in the array ingredients 
            $ingredient= new Ingredient($name,$amount);//new Instance of Ingredient whith the ingredient name and the amount of the ingredient
            echo $ingredient->ingredientsList();//function ingredientsList from the class Ingredient show a list of all ingredients 
        }     
        ///////////////////////////SEARCH////////////////////////////
        $ingredient_name="chorizo";
        echo "\nThe admin search $ingredient_name\n\n";
                
        foreach($ingredients as $name=>$amount){//for each row from the array ingredients 
            $ingredient= new Ingredient($name,$amount);//create an instance 
            echo $ingredient->ingredientSearch($ingredient_name);// call the function ingredientSearch from the class Ingredient with the name of ingredient you search as parametre
        }

            
        
    
}


?>