<?php
namespace system\router;

use ReflectionMethod;

class Routing{

    private $current_route;

    public function __construct(){
        global $current_route;
        $this->current_route = explode('/', $current_route);
    }

public function run(){
if($this->current_route[0] == ""){
    $this->current_route[0] =  'Home';
}
  $path = realpath(dirname(__FILE__) . "/../../application/controllers/" . $this->current_route[0] . ".php"); 

  if(!file_exists($path)){
   var_dump($path , 'not find!');
   exit;
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https')=== true ? 'https://' : 'http://';
    header("Location: ".$protocol.$_SERVER['HTTP_HOST']."/tahrirkhayam/". "error/error_404");
    exit;
  }
  require_once($path);

sizeof($this->current_route) == 1 ? $method = "index" : $method = $this->current_route[1];

$class = "Application\Controllers\\" . $this->current_route[0];
$object = new $class();
if (method_exists($object, $method)) {
  $reflection = new ReflectionMethod($class , $method);
  $parameterCount = $reflection->getNumberOfParameters();
  if ($parameterCount <= count(array_slice($this->current_route , 2)))
    call_user_func_array(array($object , $method), array_slice($this->current_route , 2));
    else {
     
      $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https')=== true ? 'https://' : 'http://';
    header("Location: ".$protocol.$_SERVER['HTTP_HOST']."/tahrirkhayam/". "error/error_404");
    }
    }
  else {
 
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https')=== true ? 'https://' : 'http://';
    header("Location: ".$protocol.$_SERVER['HTTP_HOST']."/tahrirkhayam/". "error/error_404");
  }
}

}