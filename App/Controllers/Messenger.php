<?php
namespace App\Controllers;

use App\Controllers\Facebook;
use Facebook\PHPFB;
/**
 * Messenger Class
 */
class Messenger extends Facebook
{
    public function index(){
        json_out([
            'messages' => 'Sorry this page just for system'
        ]);
    }
    /*
    * Function for send messages to messenger
    *   @param string
    *   @output boolean
    */
    private function send_messages($messages,$uri=null){
        if(is_null($uri)){
            $uri = $this->chat;
        }
        if($this->fb->send_message($messages,null,null,$uri)){
            return true;
        }
        return false;
    }
    private function send_image($photo, $caption, $to, $src=null){
        $this->fb->send_image($photo, $caption, $to, $src);
    }
    public function personal_messages($messages){
        $uri = [
            // Enter your list chat here
            ''
        ];
        foreach($uri as $key){
            $this->send_messages($messages,$key);
        }
    }
    public function group_messages($messages){
        $this->send_messages($messages);
    }
}
