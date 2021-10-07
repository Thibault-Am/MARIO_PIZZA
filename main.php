<?php

require_once 'src/loader/utils/AbstractClassLoader.php';
require_once 'src/loader/utils/ClassLoader.php';

$loader = new \loader\utils\ClassLoader('src');
$loader->register();

use classes\users\Admin;

$admin = new Admin('AMAGAT', 'Thibault');

echo $admin->role;