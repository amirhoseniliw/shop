<?php
namespace application\controllers;


class error extends Controller{
public function error_404() {
  
    return $this->view("app.errors.404");
}
public function error_503() {
 
  return $this->view("app.errors.503");

  }
}