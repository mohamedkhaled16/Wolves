<?php
class sharedmethods{	
	function checkExsitUser($email){
	    $data=array();
		$res=$GLOBALS['db']->select("users",$data,"email='{$email}'");
        if(empty($res)){
	           	return 0;
	        }else{
	            return $res;
	        }	
	 }
	 function getUserData($id){
	    $data=array();
		$res=$GLOBALS['db']->select("users",$data,"user_id='{$id}'");
        if(empty($res)){
	           	return 0;
	        }else{
	            return $res;
	        }	
	 }
	 function selectUsersRooms(){
	    $data=array('DISTINCT room_no ');
		$res=$GLOBALS['db']->select("users",$data,"");
		//var_dump($res);
		return $res;
	 }
	 function selectUsers(){
	    $data=[];
		$res=$GLOBALS['db']->select("users",$data,"user_type!='admin' And status='active'");
		//var_dump($res);
		return $res;
	 }
	 function getCurrentOrders(){
        $tables="users,orders";
	     $data=[];
	     $condition="orders.user_id=users.user_id
	                 and orders.status='processing'
	                 order by orders.order_id desc";
	     $query=$GLOBALS['db']->select($tables,$data,$condition);
	     return $query;
	 }
	 
	 
	  function getTotals(){

        $tables="users,orders,orders_details";
	     $data=['users.user_id','users.name','SUM(orders_details.product_price  * orders_details.product_count) AS TotalAmount'];
	     $condition="orders.user_id=users.user_id
	                 and orders.status='done'
	                 AND orders.order_id = orders_details.order_id
	                 order by orders.order_id desc";
	     $query=$GLOBALS['db']->select($tables,$data,$condition);
	     return $query;
	 }
	 
	 
	 
	 function getTotalsDetailsByUID($UID){

	  //SELECT orders.date, sum(orders_details.product_price * orders_details.product_count) AS TotalAmount FROM users,orders,orders_details WHERE orders.user_id=users.user_id and orders.status='done' AND orders.order_id = orders_details.order_id AND users.user_id=5 GROUP BY orders_details.order_id order by orders.order_id desc
	  
        $tables="users,orders,orders_details";
	     $data=['orders.date','orders.order_id','sum(orders_details.product_price * orders_details.product_count) AS TotalAmount'];
	     $condition="orders.user_id=users.user_id
	                 and orders.status='done'
	                 AND orders.order_id = orders_details.order_id
	                 AND users.user_id=".$UID."
	                 GROUP BY orders_details.order_id
	                 order by orders.order_id desc";
	     $query=$GLOBALS['db']->select($tables,$data,$condition);
	     return $query;
	 }
	 
	 function getOrdersDetails($id){
	 	 $tables="products,orders_details";
	     $data=[];
	     $condition="orders_details.product_id=products.product_id
	                 and orders_details.order_id='{$id}'
	                 order by orders_details.order_id desc";
	     $query=$GLOBALS['db']->select($tables,$data,$condition);
	     return $query;   
     }
     function getCurrentOrders_user(){
     	$tables="orders";
	     $data=[];
	     $condition="orders.user_id='{$_SESSION['user_id']}'
	                 order by orders.order_id desc";
	     $query=$GLOBALS['db']->select($tables,$data,$condition);
	     return $query;
     }
}

?>
