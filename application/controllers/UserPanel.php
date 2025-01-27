<?php
namespace application\controllers;

use application\model\panel\Users as UsersModel;

class UserPanel extends Controller{
public function index() {
   
    return $this->view("app.panel.index" );
}}