<?php 
//   error_reporting(E_ALL);
  // ini_set('display_errors', 1);
   session_start();
    $num_rec_per_page=5;
   if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
   $start_from = ($page-1) * $num_rec_per_page; 
   include __DIR__."/dblib.php";
   include __DIR__."/admin_class.php";
   include __DIR__."/shared_classes.php";
   include __DIR__."/orders_class.php";
   $db = new dbmethods();   
   $admin = new admin();
   $shared = new sharedmethods();
   $order =new orders();


?>
