<?php 
   session_start();
   include "include/dblib.php";
   include "include/admin_class.php";
   include "include/shared_classes.php";
   $db = new dbmethods();   
   $admin = new admin();
   $shared = new sharedmethods();
   

?>
