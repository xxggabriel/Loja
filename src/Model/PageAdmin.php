<?php 

namespace Model;

class PageAdmin extends Page{

    public function __construct($opts = array(),$tpl_dir = "/src/Views/admin/"){
        parent::__construct($opts = array(),$tpl_dir);
    }

}