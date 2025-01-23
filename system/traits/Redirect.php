<?php
namespace System\Traits;

trait Redirect
{
    protected function redirect($url)
    {
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https')=== true ? 'https://' : 'http://';
        header("Location: ".$protocol.$_SERVER['HTTP_HOST']."/TahrirKhayam/".$url);
    }
    
    protected function back()
    {
        $http_referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER["HTTP_REFERER"] : null;
        if ($http_referer != null) {
            header("Location: ".$_SERVER['HTTP_REFERER']);
        } else {
            echo "route not found";
        }
    
    }
    protected function dd($value)
    {
       echo "<pre>";
       var_dump($value);
       echo "</pre>";
       exit;
    }

}
