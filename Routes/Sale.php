<?php 

use Model\Page;

$app->get('/Sale', function() {
    $tpl = new Page();
 
    $tpl->setTpl("index");
});