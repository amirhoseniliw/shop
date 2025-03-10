<?php 
namespace application\controllers;

use Application\Controllers\Controller;
use application\model\Products as ProductsModel;
use application\model\panel\Category as CategoryModel;
class search extends Controller{
public function index() {
    $posts = new ProductsModel();
    $posts = $posts->all();
        return $this->view("app.orther.search" , compact('posts'));

    }
    public function category() {
       $posts = new ProductsModel();
       $posts = $posts->all();
        return $this->view("app.orther.category" , compact('posts'));

    }
    
}