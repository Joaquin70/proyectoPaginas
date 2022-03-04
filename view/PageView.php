<?php
require_once 'libs/smarty/Smarty.class.php';

class PageView{
    private $smarty;
    private $model;

    function __construct(){
        $this->smarty = new Smarty();
        $this->model = new PageDataModel();
    }

    function showHome(){
        $this->smarty->display('templates/home.tpl');
    }

    function showContact(){
        $this->smarty->display('templates/contact.tpl');
    }
    
}