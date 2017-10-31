<?php
namespace System\Core;
defined('BASEPATH') or die('You cannot access this files');

/**
 * View Class
 */
class View
{
    public static function init($files,$params){
        // Get Path Config
        $path = require_once('Config/path.php');
        // Replace all (.) to (/)
        $files = str_replace('.','/',$files);
        // Check file exists
        if(!file_exists(BASEPATH.'/'.$path['view'].'/'.$files.'.php')){
            die('View '.$files.' File Not Found');
        }
        // Extract all params
        extract($params);
        // Get View File
        require_once(BASEPATH.'/'.$path['view'].'/'.$files.'.php');
    }
}
