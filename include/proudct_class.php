<?php 
class ProudctDB{
	function insert_product($data){
      $query=$GLOBALS['db']->add("products",$data);
      return $query;
	}	
	function select_categories(){
      $query=$GLOBALS['db']->select("categories");
      return $query;
	}
	function selectProducts(){
	  $query=$GLOBALS['db']->select("products");
      return $query;
	}
	
	
	function insert_category($data){
      $query=$GLOBALS['db']->add("categories",$data);
      return $query;
	}

}
?>
