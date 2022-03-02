<?php
require_once "model/ProductsModel.php";
require_once "api/ApiController.php";

class CommentsApiController extends ApiController{


    public function __construct(){
        parent::__construct();
        $this->model = new ProductsModel();
    }


    public function getProducts($params = null){
        $this->model->getProducts();
        $this->view->response($comments, 200);
    }

    public function getProduct($params = null){
        $idComment = $params[':ID'];
        $comment = $this->model->getCommentFromDB($idComment);
        $this->view->response($comment, 200);
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

}