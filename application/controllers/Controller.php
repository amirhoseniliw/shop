<?php
namespace Application\Controllers;

use System\Traits\Img as Img_Traits;
use System\Traits\View as View_Traits;
use System\Traits\password as password_Traits;
use System\Traits\Redirect as Redirect_Traits;
use System\Traits\send_massage as send_massage_Traits;
class Controller {
    use Redirect_Traits ,View_Traits,Img_Traits , password_Traits , send_massage_Traits;
}
