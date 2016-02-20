<?php if(empty($_SESSION['user_id'])){
//echo $_SERVER['HTTP_HOST'];
header("Location: ".'http://' . $_SERVER['HTTP_HOST']."/Wolves/login.php");
die();
}
?>
