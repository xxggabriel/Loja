<?php 

namespace Controller\Exceptions;

class ExceptionsBrand{

    public static function brandExisting(){
        throw new \Exception("Marca de produto, já existente.");
    }

    public static function brandNotCreated(){
        throw new \Exception("Marca não cadastrado.");
    }

    public static function brandNotInformed(){
        throw new \Exception("Nome da marca não informado, por favor preencha o campo nome.");
    }

    public static function unsuccessfulUpdate(){
        throw new \Exception("Update dos dados, mal sucedido.");
    }


}