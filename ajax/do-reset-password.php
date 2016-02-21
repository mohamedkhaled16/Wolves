<?php
include __DIR__."/../include/classes_header-login.php";


if(isset($_SESSION['user_id'])){
$UID=$_SESSION['user_id'];

 if(!isset($_POST['password']) || empty($_POST['password'])){
          $error.="Please Enter your password <br/>";
        }else {$password=$_POST['password'];}
        if(!isset($_POST['cpassword']) || empty($_POST['cpassword'])){
          $error.="Please Enter your confirm password <br/>";
        }else {
        $cpassword=$_POST['cpassword']; 
        	if($password != $cpassword){$error.="Password not matched <br/>";}
        
        }
        
if(!empty($error)){
		echo '<div class="alert alert-danger"><strong>Error!</strong>';
		echo $error;
		echo '</div>';
		exit;
        }   
        
      else {
      $password=md5($password);
       $data =array("password"=>"{$password}");
       $result=$shared->user_update_pass($data,$UID); 
        $result=$shared->reset_pass_code($_SESSION['secret_code']);
       header('location:../login.php');
       
      }       

}

else {header('location:../login.php');}


?>
