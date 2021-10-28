<?php
require_once 'src/loader/utils/AbstractClassLoader.php';
require_once 'src/loader/utils/ClassLoader.php';
require_once 'loader.php';

$loader = new \loader\utils\ClassLoader('src');
$loader->register();

use classes\users\Admin;
use classes\users\Customer;
use classes\liste\Pizza;
use classes\liste\Ingredient;
use classes\liste\Price;
use classes\liste\CustomerDisplay;
use classes\liste\Command;
use classes\liste\PizzaioloDisplay;

function menuCustomerPizzaiolo($pizzas,$ingredients,$prices){
    $tab_command=[];
    //////////////CUSTOMERS//////////////////////////////////////////:
    echo "User chose customer menu.\n";
  ////////////////////////CUSTOMER WICH CHOOSE A EXISTING PIZZA//////////////////////////// 
    $customerDisplay=new CustomerDisplay;
    $lastname1="DUPONT";
    $firstname1="Luc";
    $customer1 = new Customer($lastname1,  $firstname1);
    $customer1->setMoney(50);
    $money_cust1=$customer1->getMoney();

    echo "Cutomer lastname:$lastname1 firstname:$firstname1\n\n";
    $customerDisplay->displayMenu();
    echo " \nCustomer chose [p] to command a pizza wich already exist.\n\n";
    echo "List of Pizza:\n\n";
    foreach($pizzas as $name => $ingr){//for each row in the array pizza
        $pizza = new Pizza($name,$ingr);//create an instance of class pizza
        echo $pizza->pizzaList();/// call to function pizzaList from the class Pizza show the list of pizza name : array(ingredients)
    }
    echo "Pizza + price :\n\n";
    foreach($prices as $pizza=>$price){
        $the_price= new Price($pizza,$price);
        echo $the_price->displayAllPrice();//function displayAllPrice from the class Price show a list of all pizza : price
    }
    $choice="vegan";
    echo "Customer $lastname1 chose the $choice pizza.\n\n";
    foreach($prices as $pizza=>$price){
        if ($pizza==$choice){
            $the_price= new Price($pizza,$price);
            $the_price=$the_price->getPrice($choice);
        }
    }
    foreach($pizzas as $pizza=>$ingr){
        $pizza= new Pizza($pizza,$ingr);
        $arrayIngTest=$pizza->arrayIng($choice);
        if (!empty($arrayIngTest)){
            foreach($arrayIngTest as $ingredient){
                echo "Ingredients : ".$ingredient."\n";
            }
            $arrayIng1=$arrayIngTest;
        }
        
    }
    $command1=new Command($choice,$the_price,$lastname1);
    $command1->customMadePizza($arrayIng1);
    echo $command1->displayCommand();
    echo $command1->tabIngredient();
    echo "customer sold:".$customer1->getMoney()."\n";
    echo "Customer payement...\n";
    $customer1->setMoney($money_cust1-$the_price);
    echo "customer sold:".$customer1->getMoney()."\n";
    echo "Command send to pizzaiolo! \n\n";
    array_push($tab_command,[$command1,$arrayIng1]);//push in the array tab_command
    ////////////////////////CUSTOMER WICH CUSTOM HIS OWN PIZZA//////////////////////////// 
    $lastname2="DURANT";
    $firstname2="Julie";
    $customer2 = new Customer($lastname2,  $firstname2);
    $customer2->setMoney(25);
    $money_cust2=$customer2->getMoney();
    echo "Cutomer lastname:$lastname2 firstname:$firstname2\n\n";
    $customerDisplay->displayMenu();
    echo " \nCustomer chose [c] to create his own pizza call : $lastname2 pizza.\n\n";
    $ingredient1="pizza_dough";
    $ingredient2="tomato_sauce";
    $ingredient3="chicken";
    $ingredient4="cheddar";
    $ingredient5="salad";
    echo "\nIngredients on the new pizza:\n $ingredient1 \n $ingredient2 \n $ingredient3 \n $ingredient4 \n $ingredient5 \n\n";
    $arrayIng2=[];
    array_push($arrayIng2,$ingredient1);//push the ingredient in the array of ingredient create before
    array_push($arrayIng2,$ingredient2);//push the ingredient in the array of ingredient create before
    array_push($arrayIng2,$ingredient3);//push the ingredient in the array of ingredient create before
    array_push($arrayIng2,$ingredient4);//push the ingredient in the array of ingredient create before
    array_push($arrayIng2,$ingredient5);//push the ingredient in the array of ingredient create before    
    $price_custom=13.00;
    echo "Price of a custom made pizza : $price_custom\n\n";
    $pizzas["$lastname2 pizza"]=$arrayIng2;
    $command2=new Command($lastname2." pizza", $price_custom,$lastname2);
    $command2->customMadePizza($arrayIng2);
    echo $command2->displayCommand();
    echo $command2->tabIngredient();
    echo "customer sold:".$customer2->getMoney()."\n";
    echo "Customer payement...\n";
    $customer2->setMoney($money_cust2-$price_custom);
    echo "customer sold:".$customer2->getMoney()."\n";
    echo "Command send to pizzaiolo! \n\n";
    array_push($tab_command,[$command2,$arrayIng2]);//push in the array tab_command
     ////////////////////////CUSTOMER WICH MODIFY A PIZZA//////////////////////////// 
     
     $lastname3="EIFFEL";
     $firstname3="Gustave";
     $customer3 = new Customer($lastname3,  $firstname3);
     $customer3->setMoney(950);
     $money_cust3=$customer3->getMoney();
     echo "Cutomer lastname:$lastname3 firstname:$firstname3\n\n";
     $customerDisplay->displayMenu();
     $pizza="4cheese";
     echo " \nCustomer chose [m] to modify the pizza : $pizza\n\n";
     $ingredient1="pizza_dough";
     $ingredient2="gorgonzola";
     $ingredient3="cheddar";
     $ingredient4="Comté_cheese";
     $ingredient5="mozzarella";
     $ingredient6="chorizo";
     echo "\nIngredients on the modify pizza:\n $ingredient1 \n $ingredient2 \n $ingredient3 \n $ingredient4 \n $ingredient5\n $ingredient6 \n\n";
     $arrayIng3=[];
     array_push($arrayIng3,$ingredient1);//push the ingredient in the array of ingredient create before
     array_push($arrayIng3,$ingredient2);//push the ingredient in the array of ingredient create before
     array_push($arrayIng3,$ingredient3);//push the ingredient in the array of ingredient create before
     array_push($arrayIng3,$ingredient4);//push the ingredient in the array of ingredient create before
     array_push($arrayIng3,$ingredient5);//push the ingredient in the array of ingredient create before    
     array_push($arrayIng3,$ingredient6);//push the ingredient in the array of ingredient create before    
     $price_modif=13.00;
     echo "Price of a modify pizza : $price_modif\n\n";
     $pizzas[$pizza." modify by $lastname3"]=$arrayIng3;
     $command3=new Command($pizza." modify by $lastname3", $price_modif,$lastname3);
     $command3->customMadePizza($arrayIng3);
     echo $command3->displayCommand();
     echo $command3->tabIngredient();
     echo "\ncustomer sold:".$customer3->getMoney()."\n";
     echo "Customer payement...\n";
     $customer3->setMoney($money_cust3-$price_modif);
     echo "customer sold:".$customer3->getMoney()."\n";
     echo "Command send to pizzaiolo! \n\n";
     array_push($tab_command,[$command3,$arrayIng3]);//push in the array tab_command


////////////////////////PIZZZAIOLO//////////////////////


    echo "\n\nUsers | Choose between: [1]Admin, [2]Customers, [3]Pizzaiolo \n [q] pour quitter\n\n";
    echo "\nYou are a Pizzaiolo.\n";
    $pizzaioloDisplay=new PizzaioloDisplay;
    echo $pizzaioloDisplay->displayMenu();
    echo "\nPizzaiolo chose to see commands\n";
    foreach($tab_command as [$command,$arrayIng]){
        echo "\nNew command:\n";
        $name_pizza=$command->getName();
        echo "Pizza : ".$name_pizza."\n";
        $command->customMadePizza($arrayIng);//display command 2
        echo $command->getCustomer()."\n";
        echo $command->displayCommand();
        echo $command->tabIngredient();
        
        foreach($pizzas as $pizza=>$ingr){
            $pizza= new Pizza($pizza,$ingr);
            $arrayIngTest=$pizza->arrayIng($name_pizza);
            if (!empty($arrayIngTest)){
                $arrayOfIngredient=$arrayIngTest;///Recup a array of ingredient of each command
            }
        }
        foreach($arrayOfIngredient as $ingredient){    
            foreach($ingredients as $ing=>$amount){
                if ($ingredient==$ing){
                    $ingredients[$ing]=$amount-1;
                }
            }
        }
        echo "\nPizzaiolo start the command for ".$command->getCustomer() ." wait 5 seconds.\n";
        sleep(5);
        
        echo "The command for ".$command->getCustomer() ." is ready you have 5 seconds to take it\n";
        sleep(5);
    }

    echo "\nUpdate stock of ingredient.\n";
    echo "\nPizzaiolo and admin want to see the stock.\n";
    foreach($ingredients as $name=>$amount){//for each row in the array ingredients 
        $ingredient= new Ingredient($name,$amount);//new Instance of Ingredient whith the ingredient name and the amount of the ingredient
        echo $ingredient->ingredientsList();//function ingredientsList from the class Ingredient show a list of all ingredients 
    }
  
}

?>