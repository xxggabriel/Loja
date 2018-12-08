<?php 

use Model\Page;

$app->get('/products', function() {
    $tpl = new Page();
 
    $tpl->setTpl("products");
});
$app->get('/product/details', function() {
    $tpl = new Page();
 
    $tpl->setTpl("product-details");
});