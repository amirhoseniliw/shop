<?php 
namespace application\controllers;

use Application\Controllers\Controller;
use application\model\Products as ProductsModel;
use application\model\panel\Category as CategoryModel;
class search extends Controller{
public function index() {
    $name = $_POST['text_search'];
    $search_name = "%$name%";   
    $posts = new ProductsModel();
    $posts = $posts->find_for_search($search_name);
    $count_posts = new ProductsModel ;
    $count_posts = $count_posts->count_all();
    
        return $this->view("app.orther.search" , compact('posts' , 'name' , 'count_posts'));

    }
    public function category() {
       $posts = new ProductsModel();
       $posts = $posts->all();
        return $this->view("app.orther.category" , compact('posts'));

    }
    
}