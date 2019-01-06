<?php 

namespace Controller\Exceptions;

class ExceptionsType{

    public static function typeExisting(){
        throw new \Exception("Tipo de produto, já existente.");
    }

    public static function typeNotCreated(){
        throw new \Exception("Tipo não cadastrado.");
    }

    public static function typeNotInformed(){
        throw new \Exception("Nome do tipo não informado, por favor preencha o campo nome.");
    }

    public static function unsuccessfulUpdate(){
        throw new \Exception("Update dos dados, mal sucedido.");
    }


}