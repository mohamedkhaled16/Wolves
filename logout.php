<?php
session_start();  
$_SESSION = array();
session_destroy();
setcookie("user_id", '', time());
 header('Location: index.php');

?>