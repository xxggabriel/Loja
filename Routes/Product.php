<?php 

use Model\Page;

$app->get('/products', function() {
    $tpl = new Page();
 
    $tpl->setTpl("products");
});