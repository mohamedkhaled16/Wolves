<?php 
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   session_start();
   include __DIR__."/dblib.php";
   include __DIR__."/admin_class.php";
   include __DIR__."/shared_classes.php";
   
   $db = new dbmethods();   
   $admin = new admin();
   $shared = new sharedmethods();
   

?>
