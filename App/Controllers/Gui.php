<?php
namespace App\Controllers;
/**
 * GUI Class
 */
use System\Core\Controller;
class Gui extends Controller
{
    public function index(){
        method('get');
        self::view('gui.index');
    }
    public function messages(){
        method('get');
        self::view('gui.messages');
    }
    public function send_messages(){
        method('post');
    }
}
