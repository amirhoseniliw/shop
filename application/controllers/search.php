<?php

namespace application\controllers;

use Application\Controllers\Controller;
use application\model\Products as ProductsModel;
use application\model\panel\Category as CategoryModel;

class search extends Controller
{
    public function index($type_posts)
    {
       
       if(isset($_GET['type_posts'])){
        $type_post = $_GET['type_posts'] ;
        return $this->redirect('search/index/' . $type_post);
       }
        if (isset($_POST['text_search'])) {
            $name = $_POST['text_search'];

            $_SESSION['name'] = $name;
        }
        else {$name =  $_SESSION['name'];}
        if ($name == "") {
            $name_status = "ALL_POSTS";
        } else {
            $name_status = "find_POSTS";
        }


        $count_posts = new ProductsModel;
        $count_posts = $count_posts->count_all();
        $category = new ProductsModel();
        $categories = $category->category();
        $search_name =  $_SESSION['name'];


      if(isset($_GET['id_category'])){
         $id_category = filter_var($_GET['id_category'], FILTER_VALIDATE_INT); 
            $posts = new ProductsModel();
        $posts = $posts->find_for_search($search_name , $id_category);
        $type_post = null ;
        
        }
        else {
            $id_category = null ;
        switch ($type_posts) {
            case 'expensive':
                 $posts = new ProductsModel();
                $posts = $posts->find_most_expensive($search_name);
                $type_post = 'expensive' ;
                break;
            case 'cheap':
                    $posts = new ProductsModel();
                $posts = $posts->find_most_cheap($search_name);
                $type_post = 'cheap' ;
             break;
            case 'Bestseller':
                    $posts = new ProductsModel();
                $posts = $posts->find_bestseller_products($search_name);
                $type_post = 'Bestseller' ;
             break;

            case 'selected':
                $posts = new ProductsModel();
                $posts = $posts->find_selected_products($search_name);
                $type_post = 'selected' ;
             break;
            case 'view':
                $posts = new ProductsModel();
                $posts = $posts->find_most_viewed($search_name);
                $type_post = 'view' ;
             break;
             case 'all':
                $posts = new ProductsModel();
                $posts = $posts->find_most_cheap_all();
                $type_post = 'cheap' ;
             break;
            default:
                $this->dd('چیزی یافت نشد !');
        }  
        }
        
        return $this->view("app.orther.search", compact('id_category' , 'type_post' , 'posts', 'name', 'name_status', 'count_posts', 'categories'));
    }

    public function search_type()
    {
        $posts = new ProductsModel();
        $posts = $posts->all();
        return $this->view("app.orther.category", compact('posts'));
    }
    public function category()
    {
        $posts = new ProductsModel();
        $posts = $posts->all();
        return $this->view("app.orther.category", compact('posts'));
    }
}
