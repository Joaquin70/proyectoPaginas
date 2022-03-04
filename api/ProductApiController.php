<?php
require_once "model/ProductModel.php";
require_once "api/ApiController.php";

class ProductApiController extends ApiController{


    public function __construct(){
        parent::__construct();
        $this->model = new ProductModel();
    }

    public function getProducts($params = null){
        $products = $this->model->getProducts();
        $this->view->response($products, 200);
    }

    public function getProduct($params = null){
        $idProduct = $params[':ID'];
        $product = $this->model->getProduct($idProduct);
        $this->view->response($product, 200);
    }

    public function deleteProduct($params = null){
        $idProduct = $params[':ID'];
        if($this->model->getProduct($idProduct)){
            $result = $this->model->deleteProduct($idProduct);
            if($result > 0){
                return $this->view->response("El producto se eliminó correctamente" , 200);
            }else{
                return $this->view->response("El producto no se eliminó", 404);
            }
        }else return $this->view->response("El producto que intenta eliminar no existe", 404);
    }

    public function addProduct($params = null){
        $data = $this->getData();
        $id = $this->model->addProduct($data->contenido, $data->puntaje, $data->id_producto); //HACER FUNCION ADDPRODUCTO PRODUCTMODEL
        if ($id != 0)
            $this->view->response("El comentario se agregó con id = $id", 200);
        else
            $this->view->response("El comentario no se agregó", 500);
    }

}