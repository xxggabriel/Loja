<?php 

use Model\Page;

$app->get('/User', function() {
    $tpl = new Page();
 
    $tpl->setTpl("index");
});