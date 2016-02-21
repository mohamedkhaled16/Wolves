<?php 
   //error_reporting(E_ALL);
   //ini_set('display_errors', 1);
   
   if ($_SERVER['HTTP_REFERER'] != "http://wolves-cafeteria.rhcloud.com/admin-home.php"){exit;}
require_once __DIR__."/../include/classes_header.php" ;
  $data=array("order_id");
  sleep(2);
  $condtion="status='cancled'";
    $result=$GLOBALS['db']->select("orders",$data,$condtion);
    if($result){
      echo json_encode($result);
    }

?>

