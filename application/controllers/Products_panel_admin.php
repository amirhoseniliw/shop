<?php 
namespace application\controllers;

use application\controllers\Controller;
use application\model\panel\Products as ProductsModel;
use application\model\panel\Category as CategoryModel;
class Products_panel_admin extends Controller{
    public function __construct()
    {
 if (!isset($_SESSION['admin_id'])) {
   return $this->redirect('Auth/login');
       }
    }
public function index() {
         $posts = new ProductsModel();
         $posts = $posts->allPanel();   
         $colors_posts_stock = new ProductsModel();
         $colors_posts_stock = $colors_posts_stock->getProductColorsWithStock(); 
        return $this->view("panel.Products.index", compact('posts' , 'colors_posts_stock'));

    }
    public function print_all (){
        
          $posts = new ProductsModel();
         $posts = $posts->allPanel_for_print();   
      
        return $this->view("panel.Products.print", compact('posts'));
            }
    public function products_create() {
        $categories = new CategoryModel();
        $categories = $categories->All();
     return $this->view("panel.Products.Create" , compact('categories'));


 }
 public function products_store() {
    

    $_POST['price'] = str_replace(',' , "" , $_POST['price'] );
    $posts = new ProductsModel();
    $posts->insert($_POST);
    return $this->redirect('Products_panel_admin');
    

}
public function products_delete($id) {

 $post = new ProductsModel();
    $post->delete($id);
    return $this->redirect('Products_panel_admin');

   

}
public function products_edit($id) {

    $posts = new ProductsModel();
    $post = $posts->find($id);
    $categories = new CategoryModel();
    $categories = $categories->All();
    return $this->view("panel.Products.edit" , compact('post', 'categories'));
    

}
public function products_update($id) {
    $post = new ProductsModel();
    $post->update($id , $_POST);
    return $this->redirect('Products_panel_admin');

}
public function Product_find(){
  if (isset($_POST['productId'])){
        $posts = new ProductsModel();  
    $posts = $posts->find($_POST['productId']); 
    if($posts == null){
        $this->flash('not_find','not find any record');
        return $this->redirect('Products_panel_admin');
    }
    return $this->view("panel.Products.find", compact('posts')); 
} else {
    $name = isset($_POST['productName']) ? $_POST['productName'] : '';  
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '';  
    $search_name = "%$name%";   
    $search_brand = "%$brand%"; 
    $posts = new ProductsModel();  
    $posts = $posts->filter($search_name , $search_brand  );  
    if($posts == null){
        $this->flash('not_find_all','not find any record');
        return $this->redirect('Products_panel_admin');
    }
    return $this->view("panel.Products.find_all", compact('posts')); }}
   

public function products_status($id) {
    $posts = new ProductsModel();
    $post = $posts->find($id);
    if ($post['status'] == 'enable') {
        $post = new ProductsModel();
        $post->update_butten($id , 'status', 'disable');
        return $this->redirect('Products_panel_admin');
    }
else {
    $post = new ProductsModel();
    $post->update_butten($id , 'status', 'enable');
    return $this->redirect('Products_panel_admin');
}
}
public function products_Selected($id) {
    $posts = new ProductsModel();
    $post = $posts->find($id);
    if ($post['Selected'] == '1') {
        $post = new ProductsModel();
        $post->update_butten($id , 'Selected', '0');
        return $this->redirect('Products_panel_admin');
    }
else {
    $post = new ProductsModel();
    $post->update_butten($id , 'Selected', '1');
    return $this->redirect('Products_panel_admin');
}
}public function products_Bestseller($id) {
    $posts = new ProductsModel();
    $post = $posts->find($id);
    if ($post['Bestseller'] == '1') {
        $post = new ProductsModel();
        $post->update_butten($id , 'Bestseller', '0');
        return $this->redirect('Products_panel_admin');
    }
else {
    $post = new ProductsModel();
    $post->update_butten($id , 'Bestseller', '1');
    return $this->redirect('Products_panel_admin');
}
//?------------------------------------------------------------------------------------------------------------
}
public function add_mor_img($id) {
    $posts = new ProductsModel();
    $post = $posts->find($id);
    $img_post = new ProductsModel();
    $img_posts = $img_post->find_img($id);
    return $this->view("panel.Products.add_morimgs", compact('post' , 'img_posts')); 
}
public function img_stor($id) {
    
    $_POST['image_url'] =  $this->saveImage($_FILES['image_url'] , '/img/posts');
    $_POST['image_url'] = str_replace( 'public/' , "",$_POST['image_url'] ); 
    $imgs = new ProductsModel();
    $img = $imgs->insert_img($id , $_POST);
    return $this->redirect('Products_panel_admin/add_mor_img/' . $id);
}
public function update_img($id) {
    $img_id = $_POST['image_id'];
    unset($_POST['image_id']);

        $img_post = new ProductsModel();
        $img_posts = $img_post->find_img_update($img_id);
        $this->removeImage($img_posts['image_url']);
        $_POST['image_url'] =  $this->saveImage($_FILES['image_url'] , '/img/posts');
        $_POST['image_url'] = str_replace( 'public/' , "",$_POST['image_url'] ); 
        // $this->dd($_POST);
        $img = new ProductsModel();
        $img->update_img($img_id , $_POST);
  return $this->redirect('Products_panel_admin/add_mor_img/' . $id);

}
public function delete_img($id) {
    
    $img_post = new ProductsModel();
    $img_posts = $img_post->find_img_update($id);
    $this->removeImage($img_posts['image_url']);
    $img = new ProductsModel();
    $img = $img->delete_img($id);
    return $this->redirect('Products_panel_admin/add_mor_img/' . $img_posts['product_id']);
}
//?----------------------------------------------------------------------------------colors
public function add_color($id) {
    $posts = new ProductsModel();
    $post = $posts->find($id);
    $colors = new ProductsModel();
    $colors = $colors->find_color($id);
    return $this->view("panel.Products.addcolors", compact('post' , 'colors')); 

}
public function color_stor($id) {
    $imgs = new ProductsModel();
    $img = $imgs->insert_color($id , $_POST);
    return $this->redirect('Products_panel_admin/add_color/' . $id);
}
public function update_color($id) {
   $colors = new ProductsModel();
   $colors = $colors->update_color($_POST['color_id'] , $_POST['stock']);
  return $this->redirect('Products_panel_admin/add_color/' . $id);

}
public function delete_color($id) {

    $color = new ProductsModel();
    $color = $color->find_color_update($id);
    $id_product = $color['product_id'] ;
    $color = new ProductsModel();
    $color = $color->delete_color($id);
    return $this->redirect('Products_panel_admin/add_color/' . $id_product);
}
}