<?php 

use Model\PageAccount;
use Controller\User\User;

$app->get('/account', function() {

$page = new PageAccount();

$page->setTpl("index");

});