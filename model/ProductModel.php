<?php
class ProductModel {
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=proyecto;charset=utf8','root','');
    }
    function getProducts(){
        $sentence = $this->db->prepare(
            "SELECT productos.*, categorias.nombre AS categoria
            FROM productos
            JOIN categorias ON productos.id_categoria = categorias.id_categoria");
        $sentence->execute();
        $products = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function getProductsCategory($id_category){
        $sentence = $this->db->prepare(
            "SELECT productos.*, categorias.nombre AS categoria
            FROM productos
            JOIN categorias ON productos.id_categoria = categorias.id_categoria
            WHERE categorias.id_categoria=?");
        $sentence->execute(array($id_category));
        $products = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

}