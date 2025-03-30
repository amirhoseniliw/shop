<?php 
namespace application\controllers;

use Application\Controllers\Controller;
use application\model\Products as ProductsModel;
use application\model\Category as CategoryModel;
use application\model\favorites as favoritesModel;

class product extends Controller{
public function index() {

    if(isset($_POST['type_posts'])){
        $type_posts = $_POST['type_posts'] ;
      
       }
else {
    $type_posts = 'cheap' ;

}
        $count_posts = new ProductsModel;
        $count_posts = $count_posts->count_all();
      
      
   
     
      
       
           $search_name = null;
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
        




        if(isset( $_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
             $favorite = new favoritesModel();
             $favorites = $favorite->find_all($user_id);
             }
            else {
             $favorites = null ;
     
            }
            $ob_category = new CategoryModel();
            $categories = $ob_category->all_cat_post();

        return $this->view("app.orther.all_product" , compact('favorites' , 'categories' ,'posts' , 'count_posts' , 'type_posts' ));

    }
public function find($id){
    $post = new ProductsModel();  

    // بررسی کنید که آیا کاربر قبلاً این محصول را دیده است یا خیر  
    if (!isset($_SESSION['product_viewed'][$id])) {  
        // اگر کاربر قبلاً محصول را ندیده بود، تعداد بازدید را به‌روزرسانی کنید  
        $post->update_view($id);  

        // یک متغیر در سشن تنظیم کنید تا نشان دهد که این کاربر در این سشن این محصول را دیده است  
        $_SESSION['product_viewed'][$id] = true;  
    }  

    $posts = new ProductsModel();  
    $post = $posts->find($id); 
    $colors = new ProductsModel();  
    $colors = $colors->findColorsByProductId($id); 
    if(isset( $_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
         $favorite = new favoritesModel();
         $favorites = $favorite->find_all($user_id);
         }
        else {
         $favorites = null ;
 
        }
        $ob_category = new CategoryModel();
        $categories = $ob_category->all_cat_post();

    return $this->view("app.orther.product", compact('favorites' , 'categories' ,'post' , 'colors'));   }
   

    public function category($id_category) {
    
               $posts = new ProductsModel();
           $posts = $posts->find_for_search('' ,$id_category);
           
           $category = new ProductsModel();
        $categories = $category->category();
        $count_posts = new ProductsModel;
        $count_posts = $count_posts->count_all();
            
        $ob_category = new CategoryModel();
        $categories = $ob_category->all_cat_post();
    
    
    
        if(isset( $_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
             $favorite = new favoritesModel();
             $favorites = $favorite->find_all($user_id);
             }
            else {
             $favorites = null ;
     
            }
       
         if($id_category == 0){
            $posts = new ProductsModel();
            $posts = $posts->find_most_cheap('');
            $name = 'همه محصولات ';
         }
         if($id_category != 0){

         
         $ob_category = new CategoryModel();
         $categories_name = $ob_category->find($id_category);
         $name = $categories_name['name'];
       } 
            return $this->view("app.orther.category" , compact('favorites' ,'posts' , 'count_posts' , 'categories' , 'name'  ));
    
        }
        public function add_favorites ($id_product){ 
            if(!isset($_SESSION['user_id'])){
                return $this->redirect('auth/login');

            }
            else {
            $id_product = (int)$id_product;  
  
            $user_id =$_SESSION['user_id'];
            $favorite = new favoritesModel();
            $favorite_ol = $favorite->find($user_id , $id_product);
            if($favorite_ol == false) {
                $favorite = new favoritesModel();
                $favorite = $favorite->insert($user_id , $id_product);
            }
            else {  

                 $favorite = new favoritesModel();
                 $favorite = $favorite->delete_home($user_id , $id_product);
                
            }

            return $this->back();
           }
        }
        

}
