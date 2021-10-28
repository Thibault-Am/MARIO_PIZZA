<?php
///regarder les factory et les instances


///DEMANDER AU PROF OU AUX ELEVES SI IL Y A UNE SAISIE AU CLAVIER OU NON



ini_set("display_errors", 1);
require_once 'src/loader/utils/AbstractClassLoader.php';
require_once 'src/loader/utils/ClassLoader.php';
require_once 'loader.php';
require_once 'admin_option.php';
require_once 'customer_pizzaiolo_option.php';

$loader = new \loader\utils\ClassLoader('src');
$loader->register();

use classes\users\Admin;
use classes\liste\Pizza;
use classes\liste\Ingredient;
use classes\liste\Price;


echo "Welcome to Mario Pizza!\n\n";
$choice = "";

echo "Users | Choose between: [1]Admin, [2]Customers, [3]Pizzaiolo \n [q] pour quitter\n\n";
echo "User chose admin menu.\n";
menuAdmin($pizzas,$ingredients,$prices);//function menuAdmin in file: admin_option.php
echo "\n\nUsers | Choose between: [1]Admin, [2]Customers, [3]Pizzaiolo \n [q] pour quitter\n\n";
menuCustomerPizzaiolo($pizzas,$ingredients,$prices);

echo "Thanks for the use Goodbye see you soon.\n";






