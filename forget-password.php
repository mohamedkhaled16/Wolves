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
<!-- ---------------------------------------------------------------------------- -->
<div class="container ">
	<h1 class="title"> Login</h1>
<hr />
<br />
<br />
<!-- ------------------------------------------------------------------------------------- -->
<div class="form-horizontal">

<!----------------------------------------------------------------------------------------- -->
		<form role="form" class="form-horizontal" action="ajax/do-forget-password.php" method="post">
			<div class="form-group">
				<label class="control-label col-sm-2" for="mail">E-Mail</label>
				<div class="col-sm-10">
					<input type="text" name="email" id="email" class="form-control">
										
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
							
				<input type="submit" class="btn btn-primary col-sm-offset-2" name="Send" value="log in">

			</div>
		</form>
				
</div>
</div>
</body>
</html>
