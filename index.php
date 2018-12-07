<?php 

require "vendor/autoload.php";

$app = new \Slim\Slim();

$app->config('debug', true);

$app->notFound(function(){
    // Colocar a tamplate de erro 404
});

// Fazendo Require das rotas
include("Routes/Web.php");
require_once("Routes/Product.php");
require_once("Routes/Provider.php");
require_once("Routes/Sale.php");
require_once("Routes/User.php");



$app->run();
