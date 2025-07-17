<?php
namespace application\controllers;

use application\model\panel\Orders as OrdersModel;
use application\model\panel\Products as ProductsModel;

class reports_panel_admin extends Controller{
    public function __construct()
    {
 if (!isset($_SESSION['admin_id'])) {
   return $this->redirect('auth/login');
       }
    }
public function index() {

    $orders = new OrdersModel();
    $orders = $orders->count();
    $product = new ProductsModel();
    $products = $product->find_bestseller();
    $countByDate = new OrdersModel();
    $countByDate = $countByDate->countByDate();
    // $this->dd($products);
    return $this->view("panel.reports.index" , compact('orders', 'products' , 'countByDate'));
}
}