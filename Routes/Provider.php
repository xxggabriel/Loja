<?php 

use Model\Page;

$app->get('/Provider', function() {
    $tpl = new Page();
 
    $tpl->setTpl("index");
});