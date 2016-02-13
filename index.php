<?php 
include("include/header.php"); 

if($_SESSION['usertype']=='user'){
	header("location:order-user.php");
}elseif($_SESSION['usertype']=='admin'){
	header("location:admin-home.php");	
}
 include("include/footer.php");
 ?>
