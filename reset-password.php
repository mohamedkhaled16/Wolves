<?php 
   include "include/classes_header-login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="Assets/css/bootstrap.css">
    <script src="Assets/js/jquery-1.11.2.js"></script>
    <link rel="stylesheet" href="Assets/css/style.css">
    <script src="Assets/js/bootstrap.js"></script>
    <script src="Assets/js/validate.js"></script>
    <link rel="stylesheet" href="Assets/font-awesome-4.5.0/css/font-awesome.css">
</head>
<body>
<img src="Assets/img/logo.png" class="logo">
<!-- ---------------------------------------------------------------------------- -->
<div class="container ">
	<h1 class="title"> Reset Password</h1>
<hr />

<!-- ------------------------------------------------------------------------------------- -->
<div class="form-horizontal login col-md-offset-2 col-md-7">
 <?php
  $flag=1;
 if(isset($_GET['code'])){
    $code=strip_tags(trim($_GET['code']));
	  $result=$shared->checkPassCode($code);  
          //var_dump($result);
          
          if ($result != false) { 
          $UID="";
          foreach($result as $row) {
          $UID=$row[UID];
          }
          $_SESSION['user_id']=$UID; 
          $_SESSION['secret_code']=$code;    
          }
          
          
          ?>
          
          <form role="form" class="form-horizontal" action="ajax/do-reset-password.php" method="post">
			<div class="form-group">
				<label class="control-label col-sm-2" for="new">New Password</label>
				<div class="col-sm-10">
					<input type="password" name="password" id="password" class="form-control">
										
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="mypass">password</label>
				<div class="col-sm-10">
					<input type="password" name="cpassword" id="cpassword" class="form-control">
				</div>	
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
				
				</div> 			
				<input type="submit" class="btn btn-primary col-sm-offset-2" name="Save" value="log in">

			</div>
		</form>
				
</div>
</div>
<p class="clearfix"></p>
    </div>
    <div class='container-fluid foot'>
        <div class="copy">copy right &copy; ITI 2016 designed & developed by Wolves</div>
        <img src="Assets/img/logo.png" class="footerimg  pull-left" >
        <p style="clear:both"></p>
    </div>
</body>
</html>
          
          <?
    
   
  }elseif($flag==1&&empty($_SESSION['user_id'])){
          header('location:../login.php');}
           
  ?>	


	<!--	<form role="form" class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="control-label col-sm-2" for="mail">E-Mail</label>
				<div class="col-sm-10">
					<input type="text" name="email" id="email" class="form-control">
										
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="mypass">password</label>
				<div class="col-sm-10">
					<input type="password" name="password" id="mypass" class="form-control">
				</div>	
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label for="">
						<input type="checkbox" name="myCheck" id="">remember me 
					</label>
				</div> 			
				<input type="submit" class="btn btn-primary col-sm-offset-2" name="login" value="log in">

			</div>
		</form>
				
</div>
</div> -->

<!----------------------------------------------------------------------------------------- -->
		
