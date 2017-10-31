<?php
namespace App\Controllers;

use Facebook\Facebook as FB;
use System\Core\Controller;
use Firebase\JWT\JWT;
/**
 * Facebook Class
 */
class Facebook extends Controller
{
    protected $email;
    protected $username;
    protected $password;
    protected $fb;
    protected $chat;
    public function __construct(){
        // Set Time Zone
        date_default_timezone_set('Asia/Jakarta');
        // Require Facebook Config
        $arr = require_once('Config/facebook.php');
        // Add Config data for login
        $this->username = $arr['username'];
        $this->email = $arr['email'];
        $this->password = $arr['password'];
        $this->cookies = $arr['cookies'];
        $this->chat = $arr['chat'];
        // login to facebook
        $this->login();
    }
    protected function login(){
        // Check and create folders
        is_dir(data) or mkdir(data);
        is_dir(logs) or mkdir(logs);
        is_dir(fb_data) or mkdir(fb_data);
        // Check if success created foldes
        if (!(is_dir(data) and is_dir(logs) and is_dir(fb_data))) {
            // If Folder can't be created
            die("Can't Create Folder");
        }
        // Facebook Login
        $this->fb = new FB($this->email,$this->password,$this->username);
        // Checking login
        if(!$this->fb->check_login()){
            // Login to facebok
            $this->fb->login();
        }
        // Output Cookies from facebook
        $this->fb_cookies = $this->fb->usercookies;
    }
    // Facebook Comment
    protected function comment($postid, $comment='~'){
        $this->fb->comment($postid, $comment);
    }
    //Facebook Reaction
    protected function reaction($postid, $type='LIKE'){
        $this->fb->reaction($postid, $type);
    }
}
