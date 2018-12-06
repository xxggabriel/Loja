<?php 

namespace Controller\Exceptions;

class ExceptionsUserPassword{

    public  static function idNonExistent(){

        throw new \Exception("O id passado não existe, favor informe um id valido.");

    }

    public static function idNotInformed(){
        throw new \Exception("Id não informado.");
    }

    public static function PasswordNotInformed(){
        throw new \Exception("Senha não informado.");
    }

    public static function IdAlreadyRegistered(){
        throw new \Exception("Esse usuario ja cadastrou a sanha");
    }

    public static function invalidToken(){
        throw new \Exception("Esse token não é valido");
    }

    public static function expiredToken(){
        throw new \Exception("Esse token expirou, favor gere outro token");
    }

}