<?php

$base_url = "http://localhost/TahrirKhayam/";
$base_dir = "/TahrirKhayam/";

$tmp = explode('?', $_SERVER['REQUEST_URI']);
$current_route = str_replace($base_dir,'',$tmp[0]);
unset($tmp);
$dbHost = 'localhost';
$dbName = 'tahrirkhayam';
$dbUsername = 'root';
$dbPassword = '';





