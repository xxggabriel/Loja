<?php 

namespace Controller\Exceptions;

class ExceptionProduct{

    public static function providerIdNotFound(){
        throw new \Exception("Id do fornecedor, não é valido");
    } 

    public static function brandIdNotFound(){
        throw new \Exception("Id da marca, não é valido");
    } 

    public static function typeIdNotFound(){
        throw new \Exception("Id do tipo, não é valido");
    } 

    public static function notCreateProduct(){
        throw new \Exception("Não foi possivel criar o produto");
    }

}