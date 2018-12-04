<?php 

require "vendor/autoload.php";
use Model\Crud;

$crud = new Crud();

$result = $crud->delete("user", "id_user = 3");
// var_dump($result);