<?php
namespace application\controllers;
use application\model\panel\Orders as OrdersModel;


class Orders_panel_admin extends Controller{
public function index() {
  $orders = new OrdersModel();
  $orders = $orders->allPanel();
    // $this->dd($orders);
    return $this->view("panel.Orders.index" , compact('orders'));
}
public function edit($id) {
    $orders = new OrdersModel();
    $order = $orders->edit_find($id);
      // $this->dd($orders);
      return $this->view("panel.Orders.edit" , compact('order'));
  }
  public function update($id) {
    
    $orders = new OrdersModel(); 
    // $this->dd($_POST);
     $orders->update($id , $_POST);


      return $this->redirect('Orders_panel_admin');
  }
  public function show($id) {
    $orders = new OrdersModel();
    $order = $orders->find($id);
      return $this->view("panel.Orders.show" , compact('order'));
  }
  // public function delete() {
  //   $orders = new OrdersModel();
  //   $orders = $orders->allPanel();
  //     // $this->dd($orders);
  //     return $this->view("panel.Orders.index" , compact('orders'));
  // }
  public function status_cancel($id) {
    $orders = new OrdersModel();
    $orders = $orders->update_butten($id , 'status' , 'canceled');
  }
  public function status_finsh($id) {
    $orders = new OrdersModel();
    $orders = $orders->update_butten($id , 'status' , 'completed');
  }
  

}