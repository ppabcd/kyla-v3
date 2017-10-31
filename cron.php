<?php
// Example Cronjob Messages
require_once('./vendor/autoload.php');
use App\Controllers\Messenger;

const BASEPATH = __DIR__;
$fb = new Messenger;
while(true){
    $time = date('H:i');
    if((string)$time == '21:00'){
        $fb->personal_messages('Hallo...');
        $fb->personal_messages('Yuk kita mulai rapatnya.');
        $fb->personal_messages('Udah jam '.$time.' nih');

        $fb->group_messages('Hallo...');
        $fb->group_messages('Yuk kita mulai rapatnya.');
        $fb->group_messages('Udah jam '.$time.' nih');
        echo "Pesan sudah terkirim semua :) \n";
    }
    else {
        echo 'Masih jam '.$time."\n";
    }
    sleep(60);
}
