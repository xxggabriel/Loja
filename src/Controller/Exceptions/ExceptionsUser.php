<?php 

namespace Controller\Exceptions;

class ExceptionsUser{

    public static function invalidEmail(){

        throw new \Exception("Informe um email valido");    

    }

    public static function emailNotInformed(){
        throw new \Exception("Email não informado");    
    }

    public static function nameNotInformed(){
        throw new \Exception("Nome não informado"); 
    }

    public static function loginNotInformed(){
        throw new \Exception("login não informado"); 
    }
}