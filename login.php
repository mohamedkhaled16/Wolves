<?php 
   include "include/classes_header.php";
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-1.11.2.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/validate.js"></script>
</head>
<body>
<!-- ---------------------------------------------------------------------------- -->
<div class="container ">
	<h1 class="title"> Login</h1>
<hr />
<br />
<br />
<!-- ------------------------------------------------------------------------------------- -->
<div class="form-horizontal">
 <?php
  $flag=1;
 if(isset($_POST['login'])){
    $email=strip_tags(trim($_POST['email']));
    $pass=md5($_POST['password']);
    $res=$shared->checkExsitUser($email); 
      $user_id=$res[0]['user_id'];
      $user_name=$res[0]['name'];
      $usertype=$res[0]['user_type'];
      $userpass=$res[0]['password'];
    if(!empty($usertype)&&!empty($user_id)){   
      if($userpass==$pass){
        $_SESSION['user_id']=$user_id;
        $_SESSION['name']=$user_name;
        $_SESSION['usertype']=$usertype;
        if(!empty($_POST['remember'])){
         if($_POST['remember']=='on'){
            setcookie("user_id", $_SESSION['user_id'], time()+3600);
          }
        }
        //echo $_SESSION['user_id'];
        //echo $_SESSION['name'];
        header('location:index.php'); 
      }else{
        echo"<p class='error red'>password not validate  try again</p>";
        $flag=0; 
      }
    }else{
      echo"<p class='error red'>email not exsits  try again</p>";
      $flag=0; 
    }
  }elseif($flag==1&&empty($_SESSION['user_id'])){
  ?>	
		<form role="form" class="form-horizontal" action="" method="post">
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
</div>
<?php }else{        header('location:index.php'); } ?>
<!----------------------------------------------------------------------------------------- -->
</body>
</html>