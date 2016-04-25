<?php 
class ProudctDB{
	function insert_product($data){
      $query=$GLOBALS['db']->add("products",$data);
      return $query;
	}
	
	function select_products(){
      $query=$GLOBALS['db']->select("products","","display='yes' LIMIT  {$GLOBALS['start_from']}, {$GLOBALS['num_rec_per_page']} ");
      return $query;
	}
	function select_products_All(){
      $query=$GLOBALS['db']->select("products","","display='yes' ");
      return $query;
	}	

	function select_categories(){
      $query=$GLOBALS['db']->select("categories");
      return $query;
	}
	function selectProducts(){
	  $query=$GLOBALS['db']->select("products","","display='yes' AND status= 'available'");
      return $query;
	}
	
	
	function insert_category($data){
      $query=$GLOBALS['db']->add("categories",$data);
      return $query;
	}
	
	
	function delete_product($id){
      $query=$GLOBALS['db']->edit("products",array("display"=>"no"),"product_id=".$id);
      return $query;
	}
	
	
	
	function change_product_status_avail($id){
      $query=$GLOBALS['db']->edit("products",array("status"=>"available"),"product_id=".$id);
      return $query;
	}
	
	
	function change_product_status_unavail($id){
      $query=$GLOBALS['db']->edit("products",array("status"=>"unavailable"),"product_id=".$id);
      return $query;
	}
	
	function product_update($array,$id){
      $query=$GLOBALS['db']->edit("products",$array,"product_id=".$id);
      return $query;
	}
		function select_products_id($id){
      $query=$GLOBALS['db']->select("products",array(),"product_id=".$id);
      return $query;
	}
	

}
?>
