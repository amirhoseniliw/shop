<?php

namespace application\controllers;

use application\controllers\Controller;
use application\model\panel\Products as ProductsModel;
use application\model\panel\Orders as OrdersModel;
use application\model\panel\Users as UsersModel;




class Panel_admin extends Controller
{
    public function __construct()
    {
        // $this->dd('hi');
        // if (!isset($_SESSION['admin_id'])) {
        //     return $this->redirect('Auth/login');
        // }
    }
   


    public function index()
    {          
        $posts = new ProductsModel();
        $count_posts = $posts->count_all();
        $orders = new OrdersModel();
        $sum_sell = $orders->sum_sell();
        $orders = new OrdersModel();
        $cunt_orders = $orders->count();
        $posts = new ProductsModel();
        $posts = $posts->all();
       $users = new UsersModel();
       $user =  $users->find($_SESSION['admin_id']);
        return $this->view("panel.index", compact('count_posts', 'sum_sell', 'cunt_orders', 'posts' , 'user'));
    }

    //?-------------------------------------------------------------------------------------------------



}
