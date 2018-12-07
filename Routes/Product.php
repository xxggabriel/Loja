<?php 

use Model\Page;

$app->get('/Product', function() {
    $tpl = new Page();
 
    $tpl->setTpl("index");
});