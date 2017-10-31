<?php
session_start();
if(!file_exists('vendor/autoload.php')){
    die('You must run \'composer install\'');
}
require_once('vendor/autoload.php');
$WebConfig = require_once('Config/website.php');
use Helper\Development;
if($WebConfig['env'] != 'production'){
    Development::timer();
}
else {
    error_reporting(0);
}
require_once('Bootstrap/helper.php');
require_once('Bootstrap/app.php');
if($WebConfig['env'] != 'production' && (!in_array(SEGMENT[0],$WebConfig['except']))){
    echo "\n<div class='rendered' style='position:fixed; bottom:0;width:99vw;text-align:center;background-color:#cfcfcf;'>Page Rendered ".Development::timer()."</div>";
}
?>
