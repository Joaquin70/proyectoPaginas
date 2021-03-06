<?php
require_once "view/ProductView.php";
require_once "model/ProductModel.php";
//require_once "helpers/AuthHelper.php";

class ProductController{

    private $model;
    private $view;
    private $authHelper;

    public function __construct(){
        $this->model = new ProductModel();
        //$this->view = new ProductView();
        //$this->authHelper = new AuthHelper();
    }

    function showHome(){
        $this->view->renderHome();
    }

    function showProducts($categories){
        $products = $this->model->getProducts();
        $this->view->renderProducts($products, $categories);
    }

    function showProductsByCategory($id_category, $categories){
        $products = $this->model->getProductsByCategory($id_category);
        $this->view->renderProducts($products, $categories);
    }

    function showProduct($id_product){
        $product = $this->model->getProduct($id_product);
        $this->view->renderProduct($product);
    }

    function showEditProduct($id_product, $categories){
        $this->authHelper->checkAdmin();
        $product = $this->model->getProduct($id_product);
        $this->view->renderEditProduct($product, $categories);
    }

    
    function addProduct(){
        $this->authHelper->checkAdmin();
        if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['imagen']) && isset($_POST['categoria']) && isset($_POST['precio'])){
            if(!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['imagen']) && !empty($_POST['categoria']) && !empty($_POST['precio'])){
                $this->model->addProductToDB($_POST['nombre'], $_POST['descripcion'], $_POST['imagen'], $_POST['categoria'], $_POST['precio']);
                header("Location: ".BASE_URL."products");
            }
        }
    }

    /*function deleteProduct($id_producto){
        $this->authHelper->checkAdmin();
        $this->model->deleteProductFromDB($id_producto);
        header("Location: ".BASE_URL."products");
    }*/

    /*function updateProduct($id_producto){
        $this->authHelper->checkAdmin();
        if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['contenido']) && isset($_POST['id_categoria'])){
            if(!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['contenido']) && !empty($_POST['id_categoria'])){
                $this->model->updateProduct($_POST['nombre'], $_POST['descripcion'], $_POST['contenido'], $_POST['id_categoria'], $id_producto);
                header("Location: ".BASE_URL."products");
            }
        }
    }*/

}