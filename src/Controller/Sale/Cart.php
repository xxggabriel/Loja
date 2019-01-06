<?php 

namespace Controller\Sale;

use Model\Crud;

class Cart extends Crud{

    private $id_user;
    private $id_product;
    private $ammount;
    private $session;


    public function addToCart($data = array()){

        $this->create("tb_cart", [
            "id_user" => $this->getId_user(),
            "id_product" => $this->getId_product(),
            "ammount" => $this->getAmmount(),
            "session" => $this->getSession()
        ]);

    }


    public static function listCart(){

    }

    public static function listAllCart(){

    }

    public static function upgradeCart(){

    }

    public static function removeProduct(){

    }

    public static function removeAllProduct(){

    }



    public function getId_user()
    {
        return $this->id_user;
    }


    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }


    public function getId_product()
    {
        return $this->id_product;
    }


    public function setId_product($id_product)
    {
        $this->id_product = $id_product;

        return $this;
    }


    public function getAmmount()
    {
        return $this->ammount;
    }


    public function setAmmount($ammount)
    {
        $this->ammount = $ammount;

        return $this;
    }

    public function getSession()
    {
        return $this->session;
    }


    public function setSession($session)
    {
        $this->session = $session;

        return $this;
    }
}