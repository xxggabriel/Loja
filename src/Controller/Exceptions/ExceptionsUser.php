<?php 

namespace Controller\Exceptions;

class ExceptionsUser{

    public static function invalidEmail(){

        throw new \Exception("Informe um email valido");    

    }

    public static function emailNotInformed(){
        throw new \Exception("Email não informado.");    
    }

    public static function nameNotInformed(){
        throw new \Exception("Nome não informado."); 
    }

    public static function loginNotInformed(){
        throw new \Exception("login não informado."); 
    }

    public static function notCreateUser(){
        throw new \Exception("Não foi passivel criar o Usuário.");
    } 

    public static function invalidLogin(){
        throw new \Exception("Login ou senha invalido.");
    } 
    public  static function idNonExistent(){

        throw new \Exception("O id passado não existe, por favor informe um id valido.");

    }

    public static function idNotInformed(){
        throw new \Exception("Id não informado.");
    }

    public static function PasswordNotInformed(){
        throw new \Exception("Senha não informado.");
    }

    public static function IdAlreadyRegistered(){
        throw new \Exception("Esse usuario ja cadastrou a sanha.");
    }

    public static function invalidToken(){
        throw new \Exception("Esse token não é valido.");
    }

    public static function expiredToken(){
        throw new \Exception("Esse token expirou, por favor gere outro token.");
    }
}