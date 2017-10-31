<?php
// Get Root folder
$ROOT = explode('index.php',$_SERVER['SCRIPT_NAME'])[0];

// Create BASE URL
$BASEURL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$ROOT;

// Explode Root folder with segment request.
$SEGMENT = array_filter(explode($ROOT,$_SERVER['REQUEST_URI']));
// Counting Segment Request
if(count($SEGMENT == 0)){
    $SEGMENT = null;
}
else {
    foreach($SEGMENT as $key){
        $SEGMENT = $key;
    }
}
// Return null to ROOT Variables
$ROOT = null;
// Explode Segment Request
$SEGMENT = explode('/',$SEGMENT);
// Get Segment 0 for Controller
if($SEGMENT[0] == null){
    $SEGMENT[0] = 'home';
}
if(isset($SEGMENT[1])):
    // Get Segment 1 for Method
    if($SEGMENT[1] == null){
        $SEGMENT[1] = 'index';
    }
endif;

// Define Segment and BASEURL Constant
define('SEGMENT',$SEGMENT);
define('BASEURL',$BASEURL);



// Create Class Variable
$class_data = (isset(SEGMENT[0]))?SEGMENT[0]:'home';
// Create Method Variable
$method_data = (isset(SEGMENT[1]))?SEGMENT[1]:'index';




// Create Class Path
$class =  __NAMESPACE__.'App\Controllers\\'.ucfirst($class_data);
// Check Class is Exists
if(!class_exists($class)){
    die("Class ".ucfirst($class_data)." Not Found \n");
}
// Check Method is Exists
if(!method_exists($class,$method_data)){
    die('Method '.ucfirst($method_data)." Not Found \n");
}
// Running class
$run = new $class;
// Running Method
$run->{$method_data}();
