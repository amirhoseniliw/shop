<?php

namespace Application\Controllers;
use application\model\Products as ProductsModel;
use application\model\Category as CategoryModel;
class Home extends Controller{

    public function index(){
       
        // $category = new CategoryModel();
        // $categories = $category->all();
        $posts = new ProductsModel();
        $Bestseller_posts = $posts->find_all('Bestseller' , 1 , 3 );
        $posts = new ProductsModel();
        $Selected_posts = $posts->find_all('Selected' , 1 , 10);
        $ob_category = new CategoryModel();
        $categories = $ob_category->all_cat_post();
        $posts = new ProductsModel();
        $Bestseller_posts_alls = $posts->find_all('Bestseller' , 1 , 100 );
        $posts = new ProductsModel();
        $all_posts = $posts->all();
        // $this->dd($categories);
        return $this->View('app.index', compact('Bestseller_posts' , 'categories' , 'Selected_posts' , 'Bestseller_posts_alls' , 'all_posts'));

    }

    public function category($id){
        $ob_category = new CategoryModel();
        $categories = $ob_category->all();

        $ob_category = new CategoryModel();
        $category = $ob_category->find($id);

        $ob_category = new CategoryModel();
         $articles = $ob_category->article($id);
         return $this->View('app.category', compact('categories', 'articles','category'));

    }
    
    public function show($id){
        $category = new CategoryModel();
        $categories = $category->all();
        return $this->View('app.detail', compact('article','categories'));

    }
    public function addcard($id){
        $this->dd($_POST);
        $category = new CategoryModel();
        $categories = $category->all();
        return $this->View('app.detail', compact('article','categories'));

    }
    


}
