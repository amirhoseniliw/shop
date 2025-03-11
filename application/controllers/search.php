<?php 
namespace application\controllers;

use Application\Controllers\Controller;
use application\model\Products as ProductsModel;
use application\model\panel\Category as CategoryModel;
class search extends Controller{
public function index() {
    $name = $_POST['text_search'];
if($name == ""){
    $name_status = "ALL_POSTS" ;
}
else {
    $name_status = "find_POSTS" ;
}

  
    $count_posts = new ProductsModel ;
    $count_posts = $count_posts->count_all();
    $category = new ProductsModel () ;
    $categories = $category->category();
    $search_name = "%$name%";  
    $posts = new ProductsModel();
    $posts = $posts->find_for_search($search_name);
    return $this->view("app.orther.search" , compact('posts' , 'name', 'name_status' , 'count_posts' , 'categories'));

    }
    public function category() {
       $posts = new ProductsModel();
       $posts = $posts->all();
        return $this->view("app.orther.category" , compact('posts'));

    }
    
}