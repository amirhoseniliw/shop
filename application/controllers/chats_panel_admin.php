<?php
namespace application\controllers;
use application\model\messages as messagesModel;
use application\model\panel\Products as ProductsModel;

class chats_panel_admin extends Controller{
    public function __construct()
    {
 if (!isset($_SESSION['admin_id'])) {
   return $this->redirect('auth/login');
       }
    }
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
    return $this->redirect('chats_panel_admin');

 }
 public function open_chat($id) {
    $_SESSION['admin_id'] = 1 ;
    $messages = new messagesModel();
    $messages = $messages->allPanel_mess($id);
    $chats = new messagesModel();
    $chath = $chats->find_chath($id);
     return $this->view("panel.chats.chat" , compact('chath' , 'messages'));
 }
 public function send_messaged_panel($id) {
    $user_id = $_SESSION['admin_id'];
    $messages = new messagesModel();
     $messages->insert($id , $user_id , $_POST);

    return $this->redirect('chats_panel_admin/open_chat/' . $id);
}
 
}