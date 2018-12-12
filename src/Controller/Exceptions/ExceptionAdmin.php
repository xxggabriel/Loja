<?php 

namespace Controller\Exceptions;

class ExceptionAdmin{

    public static function unsavedFile(){
        throw new \Exception("Erro ao salvar o arquivo");
    }
}