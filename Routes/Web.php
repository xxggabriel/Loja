<?php 

use Model\Page;
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

    header("Location: /");
    exit;

});

$app->post('/register', function() {

    header("Location: /");
    exit;

});

$app->get('/contact', function() {

    $page = new Page();
 
    $page->setTpl("contact");

});