<?php 
class ProudctDB{

	function insert_product($data){
	echo "<br>Helllllloooo<br>";
      $query=$GLOBALS['db']->add("products",$data);
      return $query;
	}	


	function select_categories(){
	echo "<br>Helllllloooo<br>";
      $query=$GLOBALS['db']->select("categories");
      return $query;
	}

}
?>
