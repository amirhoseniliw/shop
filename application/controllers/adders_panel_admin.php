<?php

namespace application\controllers;

use application\model\panel\addresses;
use application\controllers\Controller;






class adders_panel_admin extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['admin_id'])) {
            return $this->redirect('auth/login');
        }
    }
   


    public function show_all()
    {          
        $city = new addresses();
        $cities = $city->all_city();
        $provinces = new addresses();
        $provinces = $provinces->all_province();
        return $this->view("panel.adderses.index" , compact('provinces' , 'cities' ));
    }
    public function update()
    {          
        $city = new addresses();
        $city->update_postal_price($_POST['city_id'] , $_POST['postal_price']);
        return $this->redirect('adders_panel_admin/show_all');

    }
    public function index()
    {          
        $city = new addresses();
        $cities = $city->all_city();
        $provinces = new addresses();
        $provinces = $provinces->all_province();
        return $this->view("panel.adderses.show" , compact('provinces' , 'cities' ));
    }

    //?-------------------------------------------------------------------------------------------------



}
