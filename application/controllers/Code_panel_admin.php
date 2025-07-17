<?php

namespace application\controllers;

use application\controllers\Controller;
use application\model\panel\Products as ProductsModel;
use application\model\panel\Orders as OrdersModel;
use application\model\panel\Users as UsersModel;
use application\model\panel\Code as CodeModel;




class Code_panel_admin extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['admin_id'])) {
            return $this->redirect('Auth/login');
        }
    }
   


    public function index()
    {          
        
       $users = new UsersModel();
       $user =  $users->find($_SESSION['admin_id']);
       $codes = new CodeModel ();
       $codes = $codes->all_panel();
    //    $this->dd($codes);
        return $this->view("panel.code.index", compact( 'user' , 'codes'));
    }
    public function create (){
                return $this->view("panel.code.create");

    }
public function edit($id)  {

      $codes = new CodeModel ();
       $codes = $codes->find($id);
    //    $this->dd($codes);
      return $this->view("panel.code.edit" , compact('codes'));

    
}
public function update($id)  { 
    // $this->dd($_POST);
            $_POST['user_id'] = !empty($_POST['user_id']) ? $_POST['user_id'] : null;

     $codes = new CodeModel ();
       $codes = $codes->update($id , $_POST);
   $this->redirect('Code_panel_admin');
}
    public function store()  {
        $_POST['user_id'] = !empty($_POST['user_id']) ? $_POST['user_id'] : null;

        $codes = new CodeModel ();
       $codes = $codes->insert($_POST);
          $this->redirect('Code_panel_admin');

    }
public function update_status($id)  {
     $codes = new CodeModel ();
       $code = $codes->find($id);
      $value = $code['is_active'] == 1 ? 0 : 1 ;
     $codes = new CodeModel ();
       $codes = $codes->update_status($id , $value);
          $this->redirect('Code_panel_admin');
}


}
