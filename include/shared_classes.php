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
}

?>