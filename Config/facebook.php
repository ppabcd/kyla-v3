<?php
defined('BASEPATH') or die('You cannot access this files');
// Facebook path for data
define("data", BASEPATH."/App/Storage/cookies_fb/data");
// For Storae
define("storage", data."/storage");
// For Logs
define("logs", data."/logs");
// For Cookies Data
define("fb_data", BASEPATH.'/App/Storage/cookies_fb/fb_data');
return [
    'email' => 'EMAIL',
    'username' => 'USERNAME',
    'password' => 'PASSWORD',
    'cookies' => 'App/Storage/cookies_fb/',
    // use https://mobile.facebook.com/messages/read/? domain
    'chat' => 'DEFAULT CHAT'
];
