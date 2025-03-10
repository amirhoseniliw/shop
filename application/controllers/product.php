<?php 
namespace application\controllers;

use Application\Controllers\Controller;
use application\model\Products as ProductsModel;
use application\model\panel\Category as CategoryModel;
class product extends Controller{
public function index() {
       
        return $this->view("app.orther.product");

    }

// public function products_update($id) {
//     if($_FILES['image_url']['tmp_name'] != null){
//         $posts = new ProductsModel();
//         $post = $posts->find($id);
//         $this->removeImage($post['image_url']);
//         $_POST['image_url'] =  $this->saveImage($_FILES['image_url'] , '/img/posts');
//         $_POST['image_url'] = str_replace( 'public/' , "",$_POST['image_url'] ); 
//         $post = new ProductsModel();
//         $post->update($id , $_POST);

//     }
    
//     $posts = new ProductsModel();
//     $post = $posts->find($id);
//     $_POST['image_url'] =  $post['image_url'];
//     $post = new ProductsModel();
//     $post->update($id , $_POST);
//     return $this->redirect('products');

// }
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

    return $this->view("app.orther.product", compact('post' , 'colors'));   }
   


//?------------------------------------------------------------------------------------------------------------
}