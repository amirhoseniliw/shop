<?php
namespace application\controllers;
use Dompdf\Dompdf;
use Dompdf\Options;
use application\model\panel\Orders as OrdersModel;


class Orders_panel_admin extends Controller{
  public function __construct()
  {
if (!isset($_SESSION['admin_id'])) {
 return $this->redirect('auth/login');
     }
  }
  
public function index() {
  $orders = new OrdersModel();
  $customer_orders  = $orders->get_all_customer_orders();
    return $this->view("panel.Orders.index" , compact('customer_orders'));
}
public function show_orders($code , $postal_price)  {
  $orders = new OrdersModel();
  $orders = $orders->show_by_delivery_code($code);
  $post = $postal_price ;
  return $this->view("panel.Orders.show_orders" , compact('orders' , 'post'));

}
//! factor =============================================



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
    return $this->view("panel.Orders.factor", [
        'orders' => $orders,
        'customer_orders' => $customer_order,
        'factor' => $factor
    ]);
}




public function change_status($delivery_code, $new_status)
{
    if ($delivery_code && $new_status) {
      $orders = new OrdersModel();

        $orders->update_status_by_delivery_code($delivery_code, $new_status);
        http_response_code(200);
        echo json_encode(['success' => true]);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'اطلاعات ناقص است']);
    }
}



  


  

}