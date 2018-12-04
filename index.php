<?php 

require "vendor/autoload.php";
use Model\Crud;
use Controller\User\User;
$crud = new Crud();
$user = new User();
// $result = $crud->read("tb_product", "*");
// var_dump($result);

$data = [
    "name" => "Olavo De Carvalho",
    "login" => "olala",
    "email" => "lavofilho@gmail.com",
    "phone" => "8546995",
];
// var_dump($data);exit;
// $result = $user->selectUserAll();
// var_dump($result);

$user->deleteUser(2);