<?php include "include/header.php" ;?>

<!-- ---------------------------------------------------------------------------- -->
<div>
	<h1> Add Product</h1>
</div>
<!-- ------------------------------------------------------------------------------- -->


<div class="form-horizontal">
<form role="form" class="form-horizontal"  action="login.php" method="post" ><br /><br />
			<div class="form-group col-sm-12">
			<label class="control-label" for="product" >product</label>
			<input  type="text" name="product" size="50" maxlength="10"  class="form-control" />
			</div>
			
			<div class="form-group col-sm-12">
			<label class="control-label" for="price" >Price</label>
			 <input type="number" name="price" min="0" max="100" step="10" value="30" class="form-control" />
			
			</div>
			
			
			
			<div class="form-group col-sm-6">
			<label class="control-label" for="category">category</label>
			<select name="category" class="form-control">
			  <option value="Hott">Hot</option>
			  <option value="cold">Cold</option>
			  <option value="diet">diet</option>
			  <option value="fresh juice">fresh juice</option>
			</select>
							<a href="#">Add category</a>
			</div>
					<br>
			

			<div class="form-group col-sm-12">			
			<label class="control-label" for="prod-pic" >Product Picture</label>
			<input  type="file" name="img" size="50" maxlength="10"class="form-control" />
			</div>
			
			
			
			<div class="form-group col-sm-12">
			<input type="submit" value="Save" class="btn btn-primary" />
			<input type="reset" value="Reset"class="btn btn-primary" />
			</div><br /><br />
					
		</form>

<?php include "include/footer.php" ;?>
