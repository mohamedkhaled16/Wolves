<?php 
   //error_reporting(E_ALL);
   //ini_set('display_errors', 1);
require_once __DIR__."/../include/classes_header.php" ;
  $data=array("product_id");
  $condtion="status='unavailable'";
    $result=$GLOBALS['db']->select("products",$data,$condtion);
    sleep(1);
    if($result){
      echo json_encode($result);
    }

?>

