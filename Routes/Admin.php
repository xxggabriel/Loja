<?php 

use Model\PageAdmin;
use Controller\User\User;

$app->get('/admin', function() {

$page = new PageAdmin();

$page->setTpl("index");

});