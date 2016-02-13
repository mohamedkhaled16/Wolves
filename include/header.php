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
<div class="container-fluid text-center">
<?php if(empty($_SESSION['user_id'])){  
	///check user login
	header('location:login.php'); 
 }
 $user=$shared->getUserData($_SESSION['user_id']); 
 ?>
<div  id="my-modal" class="modal" data-keyboard = "true" data-backdrop="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" ><span >&times;</span></button>
						<h4 class="modal-title">Product # 1</h4>
					</div>
					<div class="modal-body">
						<p>Press Yes to see the Details Page ....</p>
					</div>
					<div class="modal-footer">
						<a class="btn btn-success" href="det.html">Yes</a>
						<a class="btn btn-danger" data-dismiss="modal">No</a>
					</div>
				</div>				
			</div>
		</div>
<nav class="navbar navbar-inverse" >
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
		<div class="navbar-header"><a class="navbar-brand" href="#">Our BRAND</a></div>
		<div class="navbar-collapse collapse">
		  <?php if($_SESSION['usertype']=='admin'){ ?>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>          
				<li><a href="all-products.php">Products</a></li>
				<li><a href="all-user.php">Users</a></li>
				<li><a href="order-admin.php">Manual Order</a></li>
				<li><a href="checks.php">checks</a></li>
    		</ul>
    	  <?php }elseif($_SESSION['usertype']=='user'){ ?>
            <ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>          
				<li><a href="my-order.php">myOrders</a></li>
    		</ul>
    	  <?php } ?>	
		</div>

</nav>
<div class="user_data pull-right">
	<img src="uploads/<?php echo $user[0]['image'] ;?>" alt=''/>
	<a href=""><?php echo $user[0]['name'] ;?></a>  <!-- goto user page edit --> 
	<a href="logout.php">| Logout</a>
</div>

