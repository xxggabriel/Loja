<?php 

namespace Model;

use \Rain\Tpl;

class Page{

    private $tpl;
    private $values = [];
    private $default = [
        "header" => true,
        "footer" => true
    ];
    private $options = [];

    public function __construct($opts = array(),$tpl_dir = "/src/Views/site/"){

        $this->options = array_merge($this->default,$opts);

        // config
        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/src/Views/cache/",
            "debug"         => false, // set to false to improve the speed
        );
        
        Tpl::configure( $config );

        $this->tpl = new Tpl();

        if($this->options["header"] === true) {
            $this->tpl->draw("header");
        }
    }

    public function setTpl($tpl, $data = array()){

        $this->setVariables($data);

        $this->tpl->draw($tpl);

    }

    private function setVariables($data = array()){

        foreach($data as $key => $value){

            $this->tpl->assign($key,$value);

        }

    }

    public function __destruct(){
        if($this->options["footer"] === true) {
            $this->tpl->draw("footer");
        }   
    }



}