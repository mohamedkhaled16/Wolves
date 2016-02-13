<?php 
require_once __DIR__."/proudct_class.php";
class orders extends ProudctDB{
  
  	function inserOrder($data){
    // var_dump( $data);
     $query=$GLOBALS['db']->addId("orders",$data);
 
      return $query;
  	}
  function getLastOrder(){
   //  $q="order,orders_details"

     //$query=$GLOBALS['db']->addId("orders",$data);

  }
}
?>
