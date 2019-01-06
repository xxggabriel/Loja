<?php 

namespace Controller\Exceptions;

class ExceptionProvider{

    public static function nameNotInformed(){
        throw new \Exception("Nome não informado");
    }

    public static function notCreateProvider(){
        throw new \Exception("Não foi possivel cadastrar o fornecedor");
    }
}