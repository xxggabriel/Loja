<?php 

require "vendor/autoload.php";
use Model\Crud;

$crud = new Crud();

$result = $crud->read("user", "nome", "nome = 'Gabriel'");
var_dump($result);