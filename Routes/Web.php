<?php 

use Model\Page;

$app->get('/', function() {
    $tpl = new Page();
 
    $tpl->setTpl("index");
});

$app->get('/create', function() {
    $tpl = new Page();
 
    $tpl->setTpl("index");
});

$app->get('/login', function() {
    $tpl = new Page();
 
    $tpl->setTpl("index");
});