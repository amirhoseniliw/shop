<?php
namespace application\controllers;

use application\model\panel\Setting as SettingModel;

class Settings extends Controller{
public function index() {
  $setting  = new SettingModel();
  $settings = $setting->all();
//   $this->dd($settings);
    return $this->view("panel.settings.index", compact('settings'));
}
public function update($id) {
    $setting  = new SettingModel();
     $setting->update($id , $_POST);
  //   $this->dd($settings);
  return $this->redirect('settings');

  }
}