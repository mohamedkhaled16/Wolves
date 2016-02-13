<?php 
include("include/header.php"); 

if($_SESSION['usertype']=='user'){
	header("location:order-user.php");
}
 include("include/footer.php");
 ?>
