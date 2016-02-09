<?php 
class admin{
	function checkEmail($email){
		   $data=array();
		   $query=$GLOBALS['db']->select("users",$data,"email='{$email}'");
			$res=$GLOBALS['db']->query($query);
            if(empty($res)){
            	return 0;
            }else{
              return $number;
            }
		}
	function insert_user($data){
      $query=$GLOBALS['db']->add("users",$data);
      return $query;
	}	

}
?>