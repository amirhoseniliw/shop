<?php
namespace application\controllers;
use application\model\messages as messagesModel;
use application\model\panel\Products as ProductsModel;

class chats_panel extends Controller{
public function index() {

   $chats = new messagesModel();
   $chats = $chats->all_chats();
    return $this->view("panel.chats.index" , compact('chats'));
}
public function chang_status($id) {
    $chats = new messagesModel();
    $chats = $chats->find_chath($id);
    if($chats['status'] == 'open'){
        $status = 'closed' ;
    }
    else {
        $status = 'open' ;
    }

    $chats = new messagesModel();
    $chats = $chats->update_chat($id , 'status' , $status);
    return $this->redirect('chats_panel');

 }
 public function open_chat() {

    $chats = new messagesModel();
    $chats = $chats->all_chats();
     return $this->view("panel.chats.chat" , compact('chats'));
 }
}