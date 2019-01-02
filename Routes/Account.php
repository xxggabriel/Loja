
<?php 

use Model\PageAccount;
use Controller\User\User;

$app->group('/account', function() use($app){
    $app->get('/', function() {
        // User::verifyLogin("/account");
        $page = new PageAccount();
        
        $page->setTpl("index");
        
        });
        
        $app->get('/logout', function() {
            
            User::logoutUser();
            
        });
});