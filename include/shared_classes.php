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
		$res=$GLOBALS['db']->select("users",$data,"user_type!='admin'");
		//var_dump($res);
		return $res;
	 }
	 function getCurrentOrders(){
        $tables="users,orders";
	     $data=[];
	     $condition="orders.user_id=users.user_id
	                 and status='processing'
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
}

?>