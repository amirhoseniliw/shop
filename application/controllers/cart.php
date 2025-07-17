<?php

namespace application\controllers;

use application\model\Products as ProductsModel;
use application\model\Category as CategoryModel;
use application\model\addres as AssersModel;
use application\model\Users as UsersModel;
use application\model\cart as cartModel;
use application\controllers\Controller;
use application\model\Orders as OrdersModel;
use application\model\Code as CodeModel;
use Illuminate\Support\Facades\Redirect;

class Cart extends Controller
{
  


    public function add_card($id)
    {
        // اگر سبد خرید وجود ندارد، یک آرایه خالی ایجاد کنیم  
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $posts = new ProductsModel();
        $post = $posts->find($id);
        $colors = new ProductsModel();
        $color = $colors->findcolors_id(trim($_POST['colors']));

        if (!isset($color)) {
            $color['hex_value'] = 'hue';
        }
        // چک کردن اینکه آیا محصول پیدا شده است یا خیر  
        if (!$post) {
            echo "not_find";
        }

        $imageUrlsArrays = explode(',', $post['photo_file_names']);

        // دریافت اطلاعات محصول از فرم  
        $product_id = $id; // شناسه محصول  
        $quantity = (int)$_POST['count']; // تعداد محصول (تبدیل به عدد صحیح)  
        $product_name = $post['name']; // نام محصول  
        $product_price = $post['price']; // قیمت محصول  
        $product_color = $color['hex_value']; // حذف فاصله اضافی از رنگ محصول  
        $product_img  = $imageUrlsArrays[0];



        // بررسی اینکه آیا محصول قبلاً در سبد خرید وجود دارد یا خیر  
        if (array_key_exists($product_id, $_SESSION['cart'])) {
            // اگر موجود است، مقدار آن را افزایش می‌دهیم  
            $_SESSION['cart'][$product_id] = [
                'id' => $product_id,
                'name' => $product_name,
                'price' => $product_price,
                'color' => $product_color,
                'count' => $quantity,
                'img' => $product_img
            ];
        } else {
            // اگر موجود نیست، اطلاعات آن را به سبد خرید اضافه می‌کنیم  
            $_SESSION['cart'][$product_id] = [
                'id' => $product_id,
                'name' => $product_name,
                'price' => $product_price,
                'color' => $product_color,
                'count' => $quantity,
                'img' => $product_img
            ];
        }
               $_SESSION['test_id'] = $_SESSION['user_id'];

        return $this->redirect('cart');
    }
     
    public function index()
    {
          $user_id =  $_SESSION['test_id'];
         if (!isset($user_id)) {
            return $this->redirect('Auth/login');
        }
        $ob_category = new CategoryModel();
        $categories = $ob_category->all_cat_post();
        if(!isset($_SESSION['cart']) ){
            $orders = 0 ;
        }
        else {
                    $orders = $_SESSION['cart'];

        }
        return $this->View('app.cart.cart', compact('categories', 'orders'));
    }
public function applyDiscountCode()
{
   if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
                $this->Redirect('cart');
        exit;
    } 
     $code = trim($_POST['discount_code'] ?? '');
    if (empty($code)) {
                $this->flash('error' , 'کد تخفیف معتبر نیست !');

        $this->Redirect('cart');
        exit;
    }
    $codes = new CodeModel();
       $codes = $codes->find_code($_POST['discount_code']);
   if(empty($codes) ){ 
           $this->flash('error' , 'کد تخفیف معتبر نیست !');

            $this->Redirect('cart');
exit;
   }
     
   $orders = $_SESSION['cart'];
     $Total_Price = 0 ;
    foreach($orders as $order) {
    $Total_Price += $order['price'] * $order['count']; }


    if ($codes['discount_type'] == 'percent') {
        $discountAmount = ($Total_Price * $codes['discount_value']) / 100;
    } else {
        $discountAmount = $codes['discount_value'];
    }

    $_SESSION['discount_value'] = ["discountAmount" => $discountAmount , "code" => $_POST['discount_code']];
        $this->flash('success' , 'کد تخفیف  اعمال شد  !');

           $this->Redirect('cart');

}
public function removeDiscountCode()  {
    unset($_SESSION['discount_value']);
            $this->flash('success' , 'کد تخفیف  حذف شد  !');

               $this->back();

}
    public function delete_on_list($id)
    {

        unset($_SESSION['cart'][$id]);
        return $this->back();
    }
    public function checkout()
    {


        if ($_SESSION['cart'] == null) {
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
        return $this->View('app.cart.checkout', compact('categories', 'orders', 'user', 'adders'));
    }
    public function pardahct()
    {

        $user_id = $_SESSION['user_id'];
        $adders = new AssersModel();
        $adders_price = $adders->getPostalPriceByAddressId($_POST['selected_address_id']);
        $_SESSION['address_id'] = $_POST['selected_address_id'];
        $orders = $_SESSION['cart'];
        $total_price = 0;
        foreach ($orders as $order) {
            $total_price += $order['price'] * $order['count'];
        }
        if ($adders_price + $total_price = $_POST['final_total_price']) {

            $inserted_order_ids = [];
           
            

            foreach ($orders as $order) {
                $product_id = $order['id'];
                $quantity = $order['count'];
                $unit_price = $order['price'];
                $total_price = $unit_price * $quantity;
                $total_price_int = intval($total_price);
                
                 $orders_cart = new cartModel();
                $color_id = $orders_cart->get_color_id_by_hex( $order['color']);
                $orders_cart = new cartModel();

                $order_id = $orders_cart->insert_orders($user_id, [
                    $product_id,
                    $quantity,
                    $unit_price,
                    $total_price,
                    $total_price_int,
                    $color_id
                ]);
            
                if ($order_id) {
                    if (!isset($_SESSION['inserted_order_ids'])) {
                        $_SESSION['inserted_order_ids'] = [];
                    }
                    
                    $_SESSION['inserted_order_ids'][] = $order_id;
                }
            }
            
            



            $_SESSION['final_total_price'] = $_POST['final_total_price'];
            $amount = $_POST['final_total_price'];
            $amount = intval($amount) * 10;

            $_SESSION['amount'] = $amount;


            // شناسه مرچنت خود را وارد کنید (از پنل زرنپال دریافت کنید)
            $merchant_id = 'defcec54-76ec-4d9a-9650-65684644236e'; // جایگزین کنید با شناسه واقعی شما
            $callback_url = 'https://tahrirkhayam.ir/cart/complate';
            $user = new UsersModel();
            $user = $user->find_mob_email($user_id);

            $metadata_mobile = $user['phone_number'];

            if (isset($user['email']) && !empty($user['email'])) {
                $metadata_email = $user['email'];
            } else {
                $metadata_email = 'info.test@example.com';
            }


            // ساختن داده‌های بدنه درخواست به صورت آرایه و سپس تبدیل به JSON
            $postFields = json_encode([
                "merchant_id" => $merchant_id,
                "amount" => $amount,
                "callback_url" => $callback_url,
                "description" => "Transaction description.",
                "metadata" => [
                    "mobile" => $metadata_mobile,
                    "email" => $metadata_email
                ]
            ]);

            // شروع نشست cURL
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://payment.zarinpal.com/pg/v4/payment/request.json', // آدرس API زرنپال
                CURLOPT_RETURNTRANSFER => true, // پاسخ باید برگردد، نه خروجی مستقیم
                CURLOPT_ENCODING => '', // پشتیبانی از فشرده‌سازی
                CURLOPT_MAXREDIRS => 10, // تعداد حداکثر redirect ها
                CURLOPT_TIMEOUT => 0, // بدون محدودیت زمانی
                CURLOPT_FOLLOWLOCATION => true, // دنبال کردن redirect ها
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST', // درخواست POST
                CURLOPT_POSTFIELDS => $postFields, // قرار دادن داده‌های JSON
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json', // نوع محتوای ارسالی
                    'Accept: application/json' // نوع پاسخ مورد انتظار
                ),
            ));

            // اجرا و دریافت پاسخ
            $response = curl_exec($curl);

            // بستن نشست cURL
            curl_close($curl);

            // تبدیل پاسخ JSON به آرایه متاخر
            $responseData = json_decode($response, true);
                    
            // بررسی اینکه درخواست با موفقیت انجام شده است یا خیر
            if (isset($responseData['data']) && isset($responseData['data']['authority'])) {
                $authority = $responseData['data']['authority'];
                // ساخت لینک پرداخت با معتبر بودن authority
                $payment_url = "https://www.zarinpal.com/pg/StartPay/$authority";

                // هدایت کاربر به صفحه پرداخت به صورت خودکار
                header("Location: $payment_url");
                if(!isset($_SESSION['cart'])){
                    return $this->redirect('cart');}
                    
                exit(); // پایان اجرای اسکریپت پس از هدایت
            } else {
                // در صورت خطا، پیغام مناسب نشان دهید
                echo "خطا در دریافت لینک پرداخت:<br><pre>" . print_r($responseData, true) . "</pre>";
            }
        } else {
            return $this->back();
            exit;
        }
    }
    //!--------------------------------------------------------------
        public function complate()
{
    $total_amount = $_SESSION['final_total_price'] ?? 0;
    $ob_category = new CategoryModel();
    $categories = $ob_category->all_cat_post();

    $user_id = $_SESSION['user_id'] ?? 0;
    $amount = $_SESSION['amount'] ?? 0;
    $address_id = $_SESSION['address_id'] ?? 0;
    $inserted_order_ids = $_SESSION['inserted_order_ids'] ?? [];

    $merchant_id = 'defcec54-76ec-4d9a-9650-65684644236e';
    $authority = $_GET['Authority'] ?? null;

    if (!$authority) {
        return $this->View('app.cart.unsuccess_payment', compact('categories'));
    }

    $postData = json_encode([
        "merchant_id" => $merchant_id,
        "amount" => $amount,
        "authority" => $authority
    ]);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://payment.zarinpal.com/pg/v4/payment/verify.json',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json'
        ]
    ]);

    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, true);

    $cart = new cartModel();

    // ✅ پرداخت موفق
    if (isset($result['data']['code']) && $result['data']['code'] == 100) {
        $ref_id = $result['data']['ref_id'];

        // ثبت اطلاعات پرداخت
        $payment_id = $cart->insert_payment(
            $user_id,
            $authority,
            $amount,
            $total_amount,
            'success',
            $ref_id,
            $result
        );

        $delivery_code = 'DEL' . date('is') . rand(10, 99);
        $cart = new cartModel();

        // ثبت سفارش مشتری
       $customer_id =  $cart->insert_customer_orders($user_id, $inserted_order_ids, $payment_id, $address_id, $delivery_code);
       $cart = new cartModel();
       $customer_orders = $cart->get_customer_order_by_id($customer_id);
       
        // ذخیره در سشن
        $_SESSION['ref_id'] = $ref_id;
        $_SESSION['payment_result'] = $result;
        $_SESSION['delivery_code'] = $delivery_code;
        $_SESSION['order_ids_string'] = implode(',', $inserted_order_ids);

        // آپدیت وضعیت سفارش‌ها
        foreach ($inserted_order_ids as $id) {
            $cart = new cartModel();

            $cart->update_butten($id, 'status', 'completed');
        }

        unset($_SESSION['inserted_order_ids']);
          $trackingCode = $customer_orders['delivery_code'];
          $user = new UsersModel();
         $user = $user->find($user_id);
        $user_ob = new UsersModel();
        $username = $user['username'];
        $phone_number = $user['phone_number'];
        $message = $username . " عزیز، سفارش شما با موفقیت ثبت شد. کد پیگیری شما: " . $trackingCode . " می‌باشد. از خرید شما از فروشگاه لوازم‌التحریر خیام سپاسگزاریم.";
        $status = $this->sendMessage([$username ,$trackingCode ], $phone_number , 337540);
         unset($_SESSION['cart']);
        return $this->View('app.cart.success_payment', compact('categories' , 'customer_id'));

    } else {
        // ⛔ پرداخت ناموفق
        $error_message = $result['errors']['message'] ?? 'خطای نامشخص';

        $cart = new cartModel();

        $cart->insert_payment(
            $user_id,
            $authority,
            $amount,
            0, 
            'failed',
            null,
            $result
        );
        unset($_SESSION['cart']);
        $_SESSION['payment_result'] = $result;
        return $this->View('app.cart.unsuccess_payment', compact('categories'));
    }
}



    
   public function factor($id)
  {
    $orderModel = new OrdersModel();
    $customer_order = $orderModel->get_find_customer_order($id);
    if (!$customer_order) {
      die('سفارش یافت نشد.');
    }
    $orderModel = new OrdersModel();
    $orders = $orderModel->show_by_delivery_code($customer_order['delivery_code']);
    if (!$orders) {
      die('محصولی برای این سفارش یافت نشد.');
    }

    // بررسی یا ساخت فاکتور
    $factorModel = new OrdersModel();
    $factor = $factorModel->find_by_order_id($id);
    if (!$factor) {
      $factorModel = new OrdersModel();

      $lastNumber = $factorModel->get_last_factor_number();
      $newNumber = $lastNumber + 1;
      $factor_number = 'fa_' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);  // fa_0001 تا fa_9999
      $factorModel = new OrdersModel();
      $factor_id = $factorModel->create([
        'order_id' => $id,
        'factor_number' => $factor_number
      ]);
      $factorModel = new OrdersModel();

      $factor = $factorModel->find_by_order_id($id);
    }
    // نمایش فاکتور
    return $this->view("app.panel.factor", [
      'orders' => $orders,
      'customer_orders' => $customer_order,
      'factor' => $factor
    ]);
  }
}
