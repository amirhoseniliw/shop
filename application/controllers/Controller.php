<?php
namespace Application\Controllers;

use system\traits\Img as Img_Traits;
use system\traits\View as View_Traits;
use system\traits\password as password_Traits;
use system\traits\Redirect as Redirect_Traits;
use system\traits\send_massage as send_massage_Traits;
class Controller {

    use Redirect_Traits ,View_Traits,Img_Traits , password_Traits , send_massage_Traits;
}
