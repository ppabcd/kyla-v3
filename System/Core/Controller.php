<?php
namespace System\Core;
defined('BASEPATH') or die('You cannot access this files');


/**
 * Controler
 */
use System\Core\View;
class Controller
{
    public function view($path,$params=[]){
        return View::init($path,$params);
    }
}
