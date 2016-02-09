<?php include "include/header.php" ;?>
<!-- ---------------------------------------------------------------------------- -->
<div>
	<center><h1> Add Product</h1></center>
</div>
<hr />
<br />
<br />

<!-- ------------------------------------------------------------------------------------- -->

<div class="form-horizontal">
		<form role="form" class="form-horizontal">
			<div class="form-group">
				<label class="control-label col-sm-2" for="mail">E-Mail</label>
				<div class="col-sm-10">
					<input type="text" name="mail" id="mail" class="form-control">
										
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="mypass">password</label>
				<div class="col-sm-10">
					<input type="password" name="mypass" id="mypass" class="form-control">
				</div>	
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label for="">
						<input type="checkbox" name="myCheck" id="">remember me 
					</label>
				</div> 
				

				<input type="button" class="btn btn-primary col-sm-offset-2"value="log in">

			</div>
		</form>
				
</div>
<div>
	<a href="#">Forget Password ?</a>
</div>


<!----------------------------------------------------------------------------------------- -->
<?php include "include/footer.php" ;?>
