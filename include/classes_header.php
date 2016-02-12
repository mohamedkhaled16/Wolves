<?php 
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   session_start();
   include "include/dblib.php";
   include "include/admin_class.php";
   include "include/shared_classes.php";
   $db = new dbmethods();   
   $admin = new admin();
   $shared = new sharedmethods();
?>
