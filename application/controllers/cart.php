<?php

namespace Application\Controllers;
use application\model\Products as ProductsModel;
use application\model\Category as CategoryModel;
use application\model\addres as AssersModel;

use application\model\Users as UsersModel;


class Cart extends Controller{

    public function index(){
 
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
                'id' => $product_id,  
                'name' => $product_name,  
                'price' => $product_price,  
                'color' => $product_color,  
                'count' => $quantity  ,
                'img' => $product_img
            ];  
        } else {  
            // اگر موجود نیست، اطلاعات آن را به سبد خرید اضافه می‌کنیم  
            $_SESSION['cart'][$product_id] = [
                'id' => $product_id,   
                'name' => $product_name,  
                'price' => $product_price,  
                'color' => $product_color,  
                'count' => $quantity  ,
                'img' => $product_img
            ];  
        }  

        return $this->redirect('cart/index');  
    }  
    
    public function delete_on_list($id){
       
     unset($_SESSION['cart'][$id]);
     return $this->back();  
   
       }
    public function checkout(){
        if($_SESSION['cart'] == null ){
            return $this->redirect('cart');

        }
         $orders = $_SESSION['cart'];
         $user_id = $_SESSION['user_id'];
         $user = new UsersModel();
         $user = $user->find($user_id);
         $adders = new AssersModel();
         $adders = $adders->allPanel($user_id);
        
           $ob_category = new CategoryModel();
            $categories = $ob_category->all_cat_post();
            
            return $this->View('app.cart.checkout' , compact('categories' , 'orders' , 'user' , 'adders'));

    
        }
    public function pardahct (){
       

     

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://payment.zarinpal.com/pg/v4/payment/request.json',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
          "merchant_id": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...",
          "amount": "1100",
          "callback_url": "http://example.com/verify",
          "description": "Transaction description.",
          "metadata": {
            "mobile": "09399376644",
            "email": "amirhoseniliw.951858@gmail.com"
          }
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Accept: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
    }

}
