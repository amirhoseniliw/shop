<?php 
namespace application\controllers;
use application\model\panel\Article as ArticleModel;
use application\model\panel\Category as CategoryModel;
class Category_panel_admin extends Controller{
    public function __construct()
       {
    if (!isset($_SESSION['admin_id'])) {
      return $this->redirect('auth/login');
          }
       }

    public function index(){

        $category = new CategoryModel();
        $categories = $category->all();
        return $this->View('panel.Category.index', compact('categories'));
    }
    public function create(){  
        return $this->View('panel.Category.create');
    }
    public function store(){ 
         $_POST['img_url'] =  $this->saveImage($_FILES['img_url'] , '/img/category');
        $_POST['img_url'] = str_replace( 'public/' , "",$_POST['img_url'] );
       

        $category = new CategoryModel();
        $category->insert($_POST);
        return $this->redirect('Category_panel_admin');
      
    }
    public function show($id){
        return $this->View('panel.Category.show', compact('categories'));
    }
    public function edit($id){
        $ob_category = new CategoryModel();
        $category = $ob_category->find($id);
        return $this->View('panel.Category.edit' , compact('category'));
    }
    public function update($id){
        
      
        if($_FILES['img_url']['tmp_name'] != null){
            $category = new CategoryModel();
            $category = $category->find($id);
            $this->removeImage($category['img_url']);
            $_POST['img_url'] =  $this->saveImage($_FILES['img_url'] , '/img/category');
            $_POST['img_url'] = str_replace( 'public/' , "",$_POST['img_url'] ); 
            $category = new CategoryModel();
            $category->update($id ,$_POST);
    
        }
        
        $category = new CategoryModel();
        $category = $category->find($id);
        $_POST['img_url'] =  $category['img_url'];
        $category = new CategoryModel();
        $category->update($id ,$_POST);
        return $this->redirect('Category_panel_admin');
    }
    public function Delete($id){
        $category = new CategoryModel();
        $category = $category->find($id);
        $img = $this->removeImage($category['img_url']);
if($img){
    $category = new CategoryModel();
        $category->delete($id);
        return $this->redirect('Category_panel_admin');
    }  
    

    
    }
}