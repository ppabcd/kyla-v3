<?php
namespace System\AI;
/**
 * Sign System
 */
use App\Models\User;
class Sign
{
    public function login($username,$password){
        $username = secure_form(isset($_POST['username'])?$_POST['username']:null);
        $password = secure_form(isset($_POST['password'])?$_POST['password']:null);
        if(($username == null)||($password == null)){
            return false;
        }
        $user = new User;
        $check = $user->getWhere(['username'=>$username]);
        if($check == null){
            if(!$this->register($username,$password,$user)){
                return false;
            }
            $check = $user->getWhere(['username'=>$username]);
        }
        if(!password_verify($password,$check[0]->password)){
            return false;
        }
        return ['username'=>$username,'id'=>$check[0]->id_user];
    }

    public function register($username,$password,$user){
        $username = $username;
        $password = password_hash($password, PASSWORD_BCRYPT);
        $data = [
            'username' => $username,
            'password' => $password
        ];
        if($user->insert($data)){
            return true;
        }
        return false;
    }
}
