<?php
// For documentation see from helper source
use Helper\Str;
use Helper\CraynerMachine;
use Firebase\JWT\JWT;

//Random String
function random($l=6,$t='alnum'){
    return Str::random($l,$t);
}
//Strip Quotes
function strip_quotes($str){
    return Str::strip_quotes($str);
}
// Debug dd
function dd($dump){
    echo '<pre>';
    print_r($dump);
    echo '</pre>';
    die();
}
// Strip Slashes
function strip_slashes($str){
    return Str::strip_slashes($str);
}
// Crayner Machine
function cm($url,$cookie=null,$post=null,$op=null,$return=null){
    return CraynerMachine::qurl($url,$cookie,$post,$op,$return);
}
// Get Base URL
function base_url($path=null){
    $out = BASEURL;
    if($path){
        $out .= $path;
    }
    return $out;
}
// Get Segment
function segment($n){
    if(!isset(SEGMENT[$n])){
        die('Segment not found');
    }
    return SEGMENT[$n];
}
// Output json encode
function json_out($str){
    echo json_encode($str);
    die();
}
// Get Secure input
function secure_form($str){
    return htmlentities(trim($str));
}
// Get Token JWT From config
function jwt_token(){
    global $WebConfig;
    return $WebConfig['jwt'];
}
// Encode Jwt with token
function jwt_encode($data=[]){
    return JWT::encode($data,jwt_token());
}
// Decode JWT
function jwt_decode($data){
    return JWT::decode($data,jwt_token(),array('HS256'));
}
// Set Method Type
function method($data){
    $data = strtoupper($data);
    $req = [
        'POST',
        'GET',
        'PUT',
    ];
    if(!in_array($data,$req)) die('Request '.$data.' Not Found');
    if($_SERVER['REQUEST_METHOD'] != $data){
        echo 'You\'re request not found';
        die();
    }
}
