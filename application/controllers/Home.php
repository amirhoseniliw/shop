<?php

namespace application\controllers;

use mysqli;
use application\model\Category as CategoryModel;
use application\model\Products as ProductsModel;
use application\model\favorites as favoritesModel;

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
        if(isset( $_SESSION['user_id'])){
       $user_id = $_SESSION['user_id'];
        $favorite = new favoritesModel();
        $favorites = $favorite->find_all($user_id);
        }
       else {
        $favorites = null ;

       }
     
    
   

        return $this->View('app.index', compact('favorites' ,'Bestseller_posts' , 'categories' , 'Selected_posts' , 'Bestseller_posts_alls' , 'all_posts'));

    }
 
    public function abut_us () {
        $ob_category = new CategoryModel();
        $categories = $ob_category->all_cat_post();
        return $this->View('app.orther.abut_us', compact('categories'));

    }

   

    


}
