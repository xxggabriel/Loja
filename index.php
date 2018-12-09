<?php 
session_start();
require "vendor/autoload.php";

$app = new \Slim\Slim();

$app->config('debug', true);

// print_r($_SESSION);exit;
// Fazendo Require das rotas
require_once("Routes/Web.php");
require_once("Routes/Product.php");


$app->run();
 


