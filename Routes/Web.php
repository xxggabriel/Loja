<?php 

use Model\Page;
use Controller\User\User;

$app->notFound(function(){
    $page = new Page([
        "header" => false,
        "footer" => false
    ]);
    $page->setTpl("404");
});

$app->get('/', function() {
    $page = new Page();
 
    $page->setTpl("index");
});


$app->get('/login', function() {
    $page = new Page();

    $page->setTpl("login");
});

$app->post('/login', function() {
    $user = new User();
    $user->loginUser($_POST);
    header("Location: /");
    exit;

});

$app->post('/register', function() {
    $user = new User();
    $user->registerUser($_POST);
    header("Location: /");
    exit;

});

$app->get('/contact', function() {

    $page = new Page();
 
    $page->setTpl("contact");

});