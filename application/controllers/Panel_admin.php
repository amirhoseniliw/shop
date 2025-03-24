<?php 
namespace application\controllers;

use Application\Controllers\Controller;
use application\model\panel\Products as ProductsModel;
use application\model\panel\Orders as OrdersModel;



class Panel_admin extends Controller {
    
    public function index() {
        $posts = new ProductsModel();
        $count_posts = $posts->count_all();
        $orders = new OrdersModel();
        $sum_sell = $orders->sum_sell();
        $orders = new OrdersModel();
        $cunt_orders = $orders->count();
        $posts = new ProductsModel();
        $posts = $posts->all();
        return $this->view("panel.index", compact('count_posts' , 'sum_sell' , 'cunt_orders' , 'posts'));
    }
    
    //?-------------------------------------------------------------------------------------------------


 
}