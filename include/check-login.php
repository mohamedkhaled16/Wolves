<?php if(empty($_SESSION['user_id'])){
//echo $_SERVER['HTTP_HOST'];
header("Location: login.php");
die();
}
?>
