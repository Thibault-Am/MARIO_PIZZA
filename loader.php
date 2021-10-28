<?php
require_once 'src/loader/utils/AbstractClassLoader.php';
require_once 'src/loader/utils/ClassLoader.php';

$loader = new \loader\utils\ClassLoader('src');
$loader->register();

use classes\users\Admin;
use classes\liste\Pizza;
use classes\liste\Ingredient;
use classes\liste\Price;


///LOADER before any execution with array of ingredient pizza and price and with one admin
$admin = new Admin('AMAGAT', 'Thibault');
$pizzas = ['margherita'=> ['ham','mozzarella','pizza_dough','tomato_sauce'] ,
 'Chorizo'=>['chorizo','mozzarella','pizza_dough'],
 'hawaiian'=>['chicken','cheddar','pizza_dough','pineapple'],
 'vegan'=>['red_peppers','pizza_dough','salad'],
 '4cheese'=>['gorgonzola','cheddar','pizza_dough','Comté_cheese','mozzarella']
];


$prices = ['margherita'=> 10.00,
 'Chorizo'=>12.00,
 'hawaiian'=>12.50,
 'vegan'=>11.00,
 '4cheese'=>11.50
];
// print_r($pizzas);
$ingredients = ['red_peppers'=>10,
'tomato_sauce'=>10,
'tomato'=>10,
'salad'=>10,
'chorizo'=>10,
'pizza_dough'=>10,
'onion'=>10,
'mozzarella'=>10,
'Comté_cheese'=>10,
'cheddar'=>10,
'gorgonzola'=>10,
'ham'=>10,
'chicken'=>10,
'pineapple'=>10
// new Ingredient('chorizo',10),
// new Ingredient('chorizo',10),
// new Ingredient('chorizo',10),
// new Ingredient('chorizo',10),
// new Ingredient('chorizo',10)
];

foreach($prices as $name=>$price){
    new Price($name,$price) ;
    
 }
foreach($ingredients as $name=>$amount){
   new Ingredient($name,$amount) ;
   
}
foreach($pizzas as $name=>$ingr){
    new pizza($name,$ingr) ;
}

// print_r($ingredients);
?>