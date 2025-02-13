<?php
require('Crud.class.php');

$userCrud = new Crud('users');

print "<pre>";
print_r($userCrud->getAll());
print "</pre>";


print "<pre>";
print_r($userCrud->getById(3));
print "</pre>";


$userCrud->delete(5);

print "<pre>";
print_r($userCrud->getAll());
print "</pre>";








// ****************/
// create new user /
// ****************/
// $data = [
//     'name' => 'Amiraa',
//     'email' => 'amiraa@example.com',
//     'password' => '123456',
//     'active' => 1
// ];
// $userCrud->create($data);

// print "<pre>";
// print_r($userCrud->getAll());
// print "</pre>";





//update

$data = [

    'email' => 'testupdate_1@example.com',
    'password' => '123456',
    'active' => 1
];
$userCrud->update(3, $data);

print "<pre>";
print_r($userCrud->getAll());
print "</pre>";



//------------------

$productCrud = new Crud('products');

print "<pre>";
print_r($productCrud->getAll());
print "</pre>";


// $productCrud->delete(5);

// print "<pre>";
// print_r($productCrud->getAll());
// print "</pre>";
