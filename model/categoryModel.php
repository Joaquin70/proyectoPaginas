<?php
class CategoryModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpe;charset=utf8','root','');
    }

    function getCategories(){
        $sentence = $this->db->prepare("SELECT * FROM categorias");
        $sentence->execute();
        $categories = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    function getCategory($id_category){
        $sentence = $this->db->prepare( "SELECT * FROM categorias WHERE id_categoria=?");
        $sentence->execute(array($id_category));
        $category = $sentence->fetch(PDO::FETCH_OBJ);
        return $category;
    }
}