<?php 
require_once __DIR__."/proudct_class.php";
class admin extends ProudctDB {
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
	
	function select_users(){
      $query=$GLOBALS['db']->select("users","","status='active'");
      return $query;
	}
	function select_users_pagination(){
      $query=$GLOBALS['db']->select("users","","status='active' LIMIT  {$GLOBALS['start_from']}, {$GLOBALS['num_rec_per_page']} ");
      return $query;
	}
	
	function select_users_id($id){
      $query=$GLOBALS['db']->select("users","","user_id=".$id);
      return $query;
	}
		
	function delete_user($id){
      $query=$GLOBALS['db']->edit("users",array("status"=>"inactive"),"user_id=".$id);
      return $query;
	}
	
	function user_update($array,$id){
      $query=$GLOBALS['db']->edit("users",$array,"user_id=".$id);
      return $query;
	}
	
	
}
?>
