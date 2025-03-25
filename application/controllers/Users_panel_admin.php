<?php
namespace application\controllers;

use application\model\panel\Users as UsersModel;

class Users_panel_admin extends Controller{
    public function __construct()
    {
 if (!isset($_SESSION['admin_id'])) {
   return $this->redirect('auth/login');
       }
    }
public function index() {
    $users = new UsersModel();
    $users=  $users->all();
    
    return $this->view("panel.Customers.index" , compact('users'));
}
public function usersEdit($id) {
    $user = new UsersModel () ;
    $user = $user->find($id);
    return $this->view("panel.Customers.edit" , compact('user'));
}
public function usersUpdate($id) {
    $_POST['password'] = $this->hash_password($_POST['password']);
    if($_FILES['img_prof']['tmp_name'] != null){
        $users = new UsersModel();
        $user = $users->find($id);
        $this->removeImage($user['img_prof']);
        $_POST['img_prof'] =  $this->saveImage($_FILES['img_prof'] , '/img/users');
        $_POST['img_prof'] = str_replace( 'public/' , "",$_POST['img_prof'] ); 
        $user = new UsersModel();
        $user->update($id , $_POST);

    }
    
    $users = new UsersModel();
    $user = $users->find($id);
    $_POST['img_prof'] =  $user['img_prof'];
    $user = new UsersModel();
    $user->update($id , $_POST);
    return $this->redirect('Users_panel_admin');
}
public function users_add() {
    return $this->view("panel.Customers.create");
}
public function user_stor() {
    $_POST['img_prof'] =  $this->saveImage($_FILES['img_prof'] , '/img/users');
    $_POST['img_prof'] = str_replace( 'public/' , "",$_POST['img_prof'] );
    $_POST['password'] = $this->hash_password($_POST['password']);
    $Users = new UsersModel();
    $Users->insert($_POST);
    return $this->redirect('Users_panel_admin');
    }

public function usersDelete($id) {
    $Users = new UsersModel();
    $old_user =  $Users->find($id);
$img = $this->removeImage($old_user['img_prof']);
if($img){
 $user = new UsersModel();
    $user->delete($id);
    return $this->redirect('Users_panel_admin');
}}
//!-------------------------------------------------------
public function status($id) {
    $user = new UsersModel();
    $user = $user->find($id);
    if ($user['status'] == 'active') {
        $user = new UsersModel();
        $user->update_butten($id , 'status', 'inactive');
        
        return $this->redirect('Users_panel_admin');
    }
else {
    $user = new UsersModel();
    $user->update_butten($id , 'status', 'active');
    return $this->redirect('Users_panel_admin');
}
}public function user_type($id) {
    $user = new UsersModel();
    $user = $user->find($id);
    if ($user['user_type'] == 'regular') {
        $user = new UsersModel();
        $user->update_butten($id , 'user_type', 'admin');
        return $this->redirect('Users_panel_admin');
    }
else {
    $user = new UsersModel();
    $user->update_butten($id , 'user_type', 'regular');
    return $this->redirect('Users_panel_admin');
}
}}