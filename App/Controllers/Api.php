<?php
namespace App\Controllers;

use System\Core\Controller;
use System\AI\Sign;
use Firebase\JWT\JWT;
use App\Models\User;


/**
 * API Class
 */
class Api extends Controller
{
    public function index(){
        $data = [
            "messages" => 'Welcome to Kyla AI API',
        ];
        json_out($data);
    }
    public function login(){
        $username = secure_form(isset($_POST['username'])?$_POST['username']:null);
        $password = secure_form(isset($_POST['password'])?$_POST['password']:null);
        $sign = new Sign;
        $login = $sign->login($username,$password);
        if(!$login){
            json_out([
                "messages" => 'Please check your username and password'
            ]);
        }
        json_out(['token'=>jwt_encode($login)]);
    }

    public function messages(){
        $messages = secure_form(isset($_POST['messages']));
        $token = secure_form(isset($_POST['token']));
        $token = jwt_decode($token);
        
    }
}
