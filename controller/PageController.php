<?php
require_once 'view/PageView.php';

class PageController{
    
    private $view;
    
    function __construct(){
        $this->view = new PageView();
    }

    function showHome(){
        $this->view->showHome();
    }


}