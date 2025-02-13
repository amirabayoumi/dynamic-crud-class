<?php

require 'Animal.class.php';
require 'Dog.class.php';


$dog = new Dog('Dido', 'mammals');
$cat = new Animal('Tom', 'mammals');
$bird = new Animal('Tweety', 'birds');

print $dog->fetch();
print '<br>';
print $cat->move();

$cat->setName('Tommy');
$cat->setIsExtinct(true);
$dog->setIsExtinct(false);
print '<br>';
print $cat->makeNoise();

print '<br>';
print $dog->makeNoise();

print '<pre>';
print_r($dog);
print '</pre>';


print '<pre>';
print_r($cat);
print '</pre>';
