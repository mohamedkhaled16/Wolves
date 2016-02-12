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
}

?>