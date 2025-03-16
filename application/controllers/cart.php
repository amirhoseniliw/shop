<?php

namespace Application\Controllers;
use application\model\Products as ProductsModel;
use application\model\Category as CategoryModel;
use application\model\favorites as favoritesModel;

class Cart extends Controller{

    public function index(){
    //     $posts = new ProductsModel();
    //     $Bestseller_posts = $posts->find_all('Bestseller' , 1 , 3 );
    //     $posts = new ProductsModel();
    //     $Selected_posts = $posts->find_all('Selected' , 1 , 10);
       
    //     $posts = new ProductsModel();
    //     $Bestseller_posts_alls = $posts->find_all('Bestseller' , 1 , 100 );
    //     $posts = new ProductsModel();
    //     $all_posts = $posts->all();
    //     if(isset( $_SESSION['user_id'])){
    //    $user_id = $_SESSION['user_id'];
    //     $favorite = new favoritesModel();
    //     $favorites = $favorite->find_all($user_id);
    //     }
    //    else {
    //     $favorites = null ;

    //    }
     $orders = $_SESSION['cart'];
       $ob_category = new CategoryModel();
        $categories = $ob_category->all_cat_post();
        return $this->View('app.cart.cart' , compact('categories' , 'orders'));

    }

   
    public function add_card($id) {  
        // اگر سبد خرید وجود ندارد، یک آرایه خالی ایجاد کنیم  
        if (!isset($_SESSION['cart'])) {  
            $_SESSION['cart'] = []; 
  
        }  
       
        $posts = new ProductsModel();  
        $post = $posts->find($id);  
        $colors = new ProductsModel();  
        $color = $colors->findcolors_id(trim($_POST['colors'])); 

       if(!isset($color)){
        $color['hex_value'] = 'hue';
       }
        // چک کردن اینکه آیا محصول پیدا شده است یا خیر  
        if (!$post) {  
            // مدیریت خطا: محصول یافت نشد  
             //TODO
        }  
        
          $imageUrlsArrays = explode(',', $post['photo_file_names']);
       
        // دریافت اطلاعات محصول از فرم  
        $product_id = $id; // شناسه محصول  
        $quantity = (int)$_POST['count']; // تعداد محصول (تبدیل به عدد صحیح)  
        $product_name = $post['name']; // نام محصول  
        $product_price = $post['price']; // قیمت محصول  
        $product_color =$color['hex_value']; // حذف فاصله اضافی از رنگ محصول  
        $product_img  = $imageUrlsArrays[0];
    
      
    
        // بررسی اینکه آیا محصول قبلاً در سبد خرید وجود دارد یا خیر  
        if (array_key_exists($product_id, $_SESSION['cart'])) {  
            // اگر موجود است، مقدار آن را افزایش می‌دهیم  
            $_SESSION['cart'][$product_id] = [  
                'name' => $product_name,  
                'price' => $product_price,  
                'color' => $product_color,  
                'count' => $quantity  ,
                'img' => $product_img
            ];  
        } else {  
            // اگر موجود نیست، اطلاعات آن را به سبد خرید اضافه می‌کنیم  
            $_SESSION['cart'][$product_id] = [  
                'name' => $product_name,  
                'price' => $product_price,  
                'color' => $product_color,  
                'count' => $quantity  ,
                'img' => $product_img
            ];  
        }  

        return $this->redirect('cart');  
    }  

    


}
