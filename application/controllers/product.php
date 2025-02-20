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
    $posts = new ProductsModel();  
    $post = $posts->find($id); 
    if($post == null){
        $this->flash('not_find_product','not find any record');
    }
    return $this->view("app.orther.product", compact('post')); }
   


//?------------------------------------------------------------------------------------------------------------
}