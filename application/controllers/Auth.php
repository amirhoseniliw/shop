<?php

namespace Application\Controllers;

class Auth extends Controller{

    public function login(){
       

        // $this->dd($categories);
        return $this->View('app.auth.login');

    }
    public function register(){
       

        // $this->dd($categories);
        return $this->View('app.auth.register');

    }
    public function otp_sms(){
       

        // $this->dd($categories);
        return $this->View('app.auth.otp-sms');

    }
    
}