<?php 

use Model\Page;

$app->get('/products', function() {
    $tpl = new Page();
 
    $tpl->setTpl("products");
});

$app->get('/product/:link', function($link) {
    $tpl = new Page();
 
    $tpl->setTpl("product-details");
});