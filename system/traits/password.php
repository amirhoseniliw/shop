<?php

namespace System\Traits;

trait password
{
    protected function hash_password($password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        return $hashed_password;
    }
    protected function verify_password($password, $hashed_password)
    {
        return password_verify($password, $hashed_password);
    }

    protected function flash($name, $value = null)
    {
        if ($value === null) {
            // مطمئن شوید session_start() در جایی فراخوانی شده  
            if (isset($_SESSION['flash_message'][$name])) {
                $message = $_SESSION['flash_message'][$name];
                unset($_SESSION['flash_message'][$name]); // از بین بردن پیام پس از خواندن آن  
                return $message;
            }
            return null; // اگر پیامی وجود نداشت  
        } else {
            $_SESSION['flash_message'][$name] = $value; // ذخیره پیام  
        }
    }
}
