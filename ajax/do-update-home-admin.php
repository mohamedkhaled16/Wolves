<?php 
   //error_reporting(E_ALL);
   //ini_set('display_errors', 1);
   //if ($_SERVER['HTTP_REFERER'] != "http://wolves-cafeteria.rhcloud.com/admin-home.php"){exit;}   
   
require_once __DIR__."/../include/classes_header.php" ;
//$data = array();
# escape all submitted values
//var_dump($_POST['orders']);
$date=date('Y-m-d h:i:s');
$id=intval($_GET['id']);
$condition="order_id=$id";
$data =array("status"=>"delivered","date_send"=>"{$date}");
$result=$GLOBALS['db']->edit('orders',$data,$condition);
if($result){
	echo 1;
}

?>

