<?php 
namespace application\controllers;

use Application\Controllers\Controller;
use application\model\panel\Products as ProductsModel;
use application\model\panel\Category as CategoryModel;
class products extends Controller{
public function index() {
           $posts = new ProductsModel();
         $posts = $posts->allPanel();
        return $this->view("panel.products.index", compact('posts'));

    }
    public function products_create() {
        $categories = new CategoryModel();
        $categories = $categories->All();
     return $this->view("panel.products.Create" , compact('categories'));


 }
 public function products_store() {
    $_POST['image_url'] =  $this->saveImage($_FILES['image_url'] , '/img/posts');
    $_POST['image_url'] = str_replace( 'public/' , "",$_POST['image_url'] ); 
    $posts = new ProductsModel();
    $posts->insert($_POST);
    return $this->redirect('products');
    

}
public function products_delete($id) {
    $post = new ProductsModel();
    $old_post =  $post->find($id);
$img = $this->removeImage($old_post['image_url']);
if($img){
 $post = new ProductsModel();
    $post->delete($id);
    return $this->redirect('products');
}
   

}
public function products_edit($id) {

    $posts = new ProductsModel();
    $post = $posts->find($id);
    $categories = new CategoryModel();
    $categories = $categories->All();
    return $this->view("panel.products.edit" , compact('post', 'categories'));
    

}
public function products_update($id) {
    if($_FILES['image_url']['tmp_name'] != null){
        $posts = new ProductsModel();
        $post = $posts->find($id);
        $this->removeImage($post['image_url']);
        $_POST['image_url'] =  $this->saveImage($_FILES['image_url'] , '/img/posts');
        $_POST['image_url'] = str_replace( 'public/' , "",$_POST['image_url'] ); 
        $post = new ProductsModel();
        $post->update($id , $_POST);

    }
    
    $posts = new ProductsModel();
    $post = $posts->find($id);
    $_POST['image_url'] =  $post['image_url'];
    $post = new ProductsModel();
    $post->update($id , $_POST);
    return $this->redirect('products');

}
public function Product_find(){
  if (isset($_POST['productId'])){
        $posts = new ProductsModel();  
    $posts = $posts->find($_POST['productId']); 
    if($posts == null){
        $this->flash('not_find','not find any record');
        return $this->redirect('products');
    }
    return $this->view("panel.products.find", compact('posts')); 
} else {
    $name = isset($_POST['productName']) ? $_POST['productName'] : '';  
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '';  
    $search_name = "%$name%";   
    $search_brand = "%$brand%"; 
    $posts = new ProductsModel();  
    $posts = $posts->filter($search_name , $search_brand  );  
    if($posts == null){
        $this->flash('not_find_all','not find any record');
        return $this->redirect('products');
    }
    return $this->view("panel.products.find_all", compact('posts')); }}
   

public function products_status($id) {
    $posts = new ProductsModel();
    $post = $posts->find($id);
    if ($post['status'] == 'enable') {
        $post = new ProductsModel();
        $post->update_butten($id , 'status', 'disable');
        return $this->redirect('products');
    }
else {
    $post = new ProductsModel();
    $post->update_butten($id , 'status', 'enable');
    return $this->redirect('products');
}
}
public function products_Selected($id) {
    $posts = new ProductsModel();
    $post = $posts->find($id);
    if ($post['Selected'] == '1') {
        $post = new ProductsModel();
        $post->update_butten($id , 'Selected', '0');
        return $this->redirect('products');
    }
else {
    $post = new ProductsModel();
    $post->update_butten($id , 'Selected', '1');
    return $this->redirect('products');
}
}public function products_Bestseller($id) {
    $posts = new ProductsModel();
    $post = $posts->find($id);
    if ($post['Bestseller'] == '1') {
        $post = new ProductsModel();
        $post->update_butten($id , 'Bestseller', '0');
        return $this->redirect('products');
    }
else {
    $post = new ProductsModel();
    $post->update_butten($id , 'Bestseller', '1');
    return $this->redirect('products');
}
//?------------------------------------------------------------------------------------------------------------
}}