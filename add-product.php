<?php include "include/header.php" ;
?>


<script type="text/javascript">
$(document).ready(function (e){
$("#DoAddProudct").on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "do-add-product.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
alert(data);
},
error: function(){} 	        
});
}));
});

$(document).ready(function (e){
$("#DoAddCategory").on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "do-add-category.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
if(data == "1"){

UpdateCategories();
$('#Add-Category-modal').modal('hide');}
else {alert(data);}
//
},
error: function(){
alert("Something went wrong!!");
$('#Add-Category-modal').modal('hide');
} 	        
});
}));
});

$(document).ready(function(){UpdateCategories();});


function UpdateCategories(){
    //$("button").click(function(){
        $.ajax({url: "get-categories.php", success: function(result){
            $("#category_id").html(result);
        }});
   // });
}
</script>

<!-- ---------------------------------------------------------------------------- -->
<div>
	<h1> Add Product</h1>
</div>
<!-- ---------------------------------------------------------------------------- -->



<!-- ------------------------------------ADD CATEGORY FORM---------------------------------------- -->
<div  id="Add-Category-modal" class="modal" data-keyboard = "true" data-backdrop="true">
			<div class="modal-dialog">
			
										<form id="DoAddCategory" role="form" method="post" action="do-add-proudct.php"  enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" ><span >&times;</span></button>
						<h4 class="modal-title">Add new Category</h4>


					</div>
					<div class="modal-body">
						
						<div class="form-horizontal">

										  <div class="form-group row">
			    								<label class="col-lg-2" for="category">Category:</label>
			    								<div class="col-lg-10" >
			    								<input  type="text" class="form-control col-lg-9" id="category" name="category_name"></div>
			  								</div>
					
								
						</div>		
						
						
						
					</div>
					<div class="modal-footer">
						<input type="submit" name="add-category" value="Add" class="btn btn-primary" />
						<a class="btn btn-danger" data-dismiss="modal">Cancel</a>
					</div>
				</div>
				</form>				
			</div>
		</div>
<!-- ------------------------------------------------------------------------------- -->


<div class="form-horizontal">
<form role="form" class="form-horizontal" id="DoAddProudct"  action="do-add-product.php" method="post" ><br /><br />

	<div class="form-group row">
			<label class="col-lg-2" for="product_name">product:</label>
			<div class="col-lg-10" ><input  type="text" class="form-control col-lg-9" id="product_name" name="product_name"></div>
	</div>





	<div class="form-group row">
			<label class="col-lg-2" for="product_price">Price:</label>
			<div class="col-lg-10" ><input  type="text" class="form-control col-lg-9" id="product_price" name="product_price"></div>
	</div>
	
	
	
	
	
	
	<div class="form-group row">
			<label class="col-lg-2" for="fname">Category:</label>
			<div class="col-lg-10" > <div class="col-lg-7" >
			<select name="category_id"  id="category_id" class="form-control">
				<option value="SelectPlease">Select Category</option>
			</select></div>
							<div class="col-lg-3" ><a href="#" data-toggle="modal" data-target="#Add-Category-modal"  >Add category</a></div></div>
	</div>
	<div class="form-group row">
			<label class="col-lg-2" for="proudct_image">Product Picture:</label>
			<div class="col-lg-10" ><input  type="file" class="form-control col-lg-9" id="proudct_image" name="proudct_image"></div>
	</div>

		
			
			
			
	<div class="form-group row text-center">
			<div class="col-lg-5"><input name="submit" type="submit" class="btn-lg btn-primary" value="Submit"></div>
			<div class="col-lg-3"><button type="reset" class="btn-lg btn-danger">Reset</button></div>
	</div>			
			
			
			<br /><br />
					
		</form>

<?php include "include/footer.php" ;?>
