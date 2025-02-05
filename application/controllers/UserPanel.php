<?php
namespace application\controllers;

use application\model\panel\Users as UsersModel;

class UserPanel extends Controller{
public function index() {
    if(!isset($_SESSION['id_user'])){
        return $this->redirect('auth/login');

    }
  $user_id = $_SESSION['id_user'];
  $user = new UsersModel () ;
  $user = $user->find($user_id);
    return $this->view("app.panel.index" , compact('user'));
}
public function edit_profil() {
    if(!isset($_SESSION['id_user'])){
        return $this->redirect('auth/login');

    }
  $user_id = $_SESSION['id_user'];
  $user = new UsersModel () ;
  $user = $user->find($user_id);
    return $this->view("app.panel.edit" , compact('user'));
}
}