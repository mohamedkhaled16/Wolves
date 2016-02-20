<?php if($_SESSION['usertype']!='admin'){ 
header("Location: login.php");
die();
}
?>
