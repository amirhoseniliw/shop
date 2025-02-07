<?php
namespace Application\Controllers;

use System\Traits\Img;
use System\Traits\View;
use System\Traits\password;
use System\Traits\Redirect;
use System\Traits\send_massage;
class Controller {
    use Redirect,View,Img , password , send_massage;
}
