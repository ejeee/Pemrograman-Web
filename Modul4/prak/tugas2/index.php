<?php

require_once 'vendor/autoload.php';

use src\Animals\Cat;
use src\Animals\Dog;

// log(dirname);

$cat = new Cat();
$cat->setName('Popay');
$cat->log('Cat Name: ' . $cat->getName() . ', Sound: ' . $cat->makeSound());

echo '<br>';

$dog = new Dog();
$dog->setName('Ciro');
$dog->log('Dog Name: ' . $dog->getName() . ', Sound: ' . $dog->makeSound());
?>