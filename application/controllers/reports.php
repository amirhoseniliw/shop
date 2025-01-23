<?php
namespace application\controllers;

use application\model\panel\Orders as OrdersModel;
use application\model\panel\Products as ProductsModel;

class Reports extends Controller{
public function index() {

    $orders = new OrdersModel();
    $orders = $orders->count();
    $product = new ProductsModel();
    $products = $product->find_bestseller();
    // $this->dd($products);
    return $this->view("panel.reports.index" , compact('orders', 'products'));
}
}