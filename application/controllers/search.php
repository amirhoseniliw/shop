<?php 
namespace application\controllers;

use Application\Controllers\Controller;
use application\model\Products as ProductsModel;
use application\model\panel\Category as CategoryModel;
class search extends Controller{
public function index() {
       
        return $this->view("app.orther.search");

    }
    public function category() {
       
        return $this->view("app.orther.category");

    }
    
}