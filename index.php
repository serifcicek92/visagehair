<?php
// require_once 'system/Attributes/Test.php';
// exit;








declare(strict_types = 1);

// php -S localhost:8888
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
ob_start();
session_start();
set_include_path('c:\xampp\htdocs\mvcphp');
//define THEMANAME, SITEADRESS, BASEURL, INCLUDEPATH
require_once 'system/define.php';

// Include System Files
foreach (glob(INCLUDEPATH."/system/*.php") as $filename) {
    require_once $filename;
}

// Include Models 
foreach (glob(INCLUDEPATH."/app/controllers/*.php") as $filename) {
    require_once $filename;
}

// Include Controllers 
foreach (glob(INCLUDEPATH."/app/models/*.php") as $filename) {
    require_once $filename;
}

// Include Attributes 
foreach (glob(INCLUDEPATH."/system/Attributes/*.php") as $filename) {
    require_once $filename;
}

use App\System\Application;

$app = new Application();

$app->runControllers([
    App\Controllers\Home::class,
    App\Controllers\Auth::class
]);
    
ob_end_flush();