<?php 

namespace Controller\Exceptions;

class ExceptionsUserProfile{

    public static function existingUser(){

        throw new \Exception("Exite usuário com esse mesmo user name, tente usar outro");    

    }

    public static function notInformedUserName(){

        throw new \Exception("Nome de usuário não informado, favor informe um nome de usuário");    

    }

    public static function notInformedIdUser(){
        throw new \Exception("Id do usuário não foi informado.");
    }

    public static function idNonExistent(){
        throw new \Exception("Id do usuário não exitente");
    }

    public static function userIdExisting(){
        throw new \Exception("Usuário já cadastrado");
    }

}