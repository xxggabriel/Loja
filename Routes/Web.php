<?php 

use Model\Page;
use Controller\User\User;

$app->notFound(function(){
    $page = new Page([
        "header" => false,
        "footer" => false
    ]);
    $page->setTpl("404",[],false);
});

$app->get('/', function() {
    $page = new Page();
    
    $page->setTpl("slider", [],false);
    $page->setTpl("index");
});


$app->get('/login', function() {
    $page = new Page();
    User::logoutUser(false);
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
 
    $page->setTpl("contact",[],false);

});

