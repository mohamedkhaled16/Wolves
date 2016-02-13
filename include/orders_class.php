<?php 
require_once __DIR__."/proudct_class.php";
class orders extends ProudctDB{
  
  	function inserOrder($data){
    // var_dump( $data);
     $query=$GLOBALS['db']->addId("orders",$data);
      return $query;
  	}
  function getLastOrder(){
     $tables="orders_details,products";
     $data=[];
     $condition="orders_details.order_id=(select order_id  from orders order by order_id  desc limit 1) 
                 and orders_details.user_id='{$_SESSION['user_id']}'
                 and products.product_id= orders_details.product_id
                 order by orders_details.order_id desc";
     $query=$GLOBALS['db']->select($tables,$data,$condition);
     return $query;
    
    // var_dump($query);
  }
}
?>
