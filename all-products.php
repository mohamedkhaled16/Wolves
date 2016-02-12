<?php 
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
 require_once __DIR__."/include/header.php" ;

          $result=$admin->select_products();
          
?>
<!--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script>
function changeProudctStatusUnAvail(PID){
$.post("ajax/do-product.php",
    {
        product_id: PID,
        product_unavail: "product_unavail"
    },
    function(data, status){
    if(  status == "success" && data == 1){    
    $('#status'+PID).removeClass("text-success");
	    $('#status'+PID).addClass("text-danger");
	    $('#statusspan'+PID).html("UnAvialble");
	$('#status'+PID).attr("onclick","changeProudctStatusAvail("+PID+")");
	$('#status'+PID).html('<i class="fa fa-toggle-off fa-3x"></i>');
    }

    });
}

function changeProudctStatusAvail(PID){
$.post("ajax/do-product.php",
    {
        product_id: PID,
        product_avail: "product_avail"
    },
    function(data, status){
    if(  status == "success" && data == 1){
	   $('#status'+PID).addClass("text-success");
    $('#status'+PID).removeClass("text-danger"); 
    $('#statusspan'+PID).html("Avialble");
    $('#status'+PID).attr("onclick","changeProudctStatusUnAvail("+PID+")");
    $('#status'+PID).html('<i class="fa fa-toggle-on fa-3x"></i>');
    
    
    }

    });
}

function deleteProudct(PID){

$.post("ajax/do-product.php",
    {
        product_id: PID,
        delete_p: "delete_p"
    },
    function(data, status){
    //alert(data+"status"+status);
    if(status == "success"){
    //alert(PID);
    $('#row'+PID).remove();
    }

    });
}

function editProudct(PID){
alert(PID);
}

</script>

<!-- ---------------------------------------------------------------------------- -->
<div>
	<h1> All Products</h1>
	<a href="add-products.html" align="left">Add product</a> 

</div>
<div class="table-responsive">
			<table class="table table-hover table-bordered table-condensed table-hover">
			<tr>
                <th>Product</th>
				<th>Price</th>
				<th style="width:200px" width="200">Image</th>
				<th style="width:300px" width="300">Action</th>

			</tr>
			<?php
			
			          if($result){
		foreach($result as $row) {
				$product_id=$row['product_id'];
				$product_name=$row['product_name'];
				$product_price=$row['product_price'];
				$category_id=$row['category_id'];
				$status=$row['status'];
				$display=$row['display'];
				$image=$row['image'];
				echo "<tr id='row$product_id'>";
				echo "<td>$product_name</td>";
				echo "<td>$product_price</td>";
				echo "<td><img style='width:200px' class='img-rounded img-responsive'  src='$image'></td>";
				echo '<td>';
				if($status == "unavailable"){
				echo '<span id="statusspan'.$product_id.'" >UnAvailable</span><a href="javascript:void(0);" class="text-danger" onclick="changeProudctStatusAvail('.$product_id.')" id="status'.$product_id.'"><i class="fa fa-toggle-off fa-3x"></i></a>';}
				else{
				echo '<span id="statusspan'.$product_id.'" >Available</span><a href="javascript:void(0);" class="text-success" onclick="changeProudctStatusUnAvail('.$product_id.')" id="status'.$product_id.'"><i class="fa fa-toggle-on fa-3x"></i></a>';
				}
				echo '<a href="javascript:void(0);" class="text-primary" onclick="editProudct('.$product_id.')" id="edit'.$product_id.'"><i class="fa fa-pencil-square-o fa-3x"></i></a>';
				echo '<a href="javascript:void(0);" class="text-danger" onclick="deleteProudct('.$product_id.')" id="delete'.$product_id.'"><i class="fa fa-trash-o fa-3x"></i></a>';
				echo '</td>';	
				echo "</tr>";
			}

			}
			
			
			/*
			
			<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Avalible" data-off="UnAvalible" type="checkbox" onclick="statusProudct('.$product_id.')">
				<i class="fa fa-camera-retro fa-lg"></i>
				<a href="javascript:void(0);" class="text-danger" onclick="statusProudct('.$product_id.')"><i class="fa fa-toggle-on fa-4x"></i></a>
				<a href="#" class="text-success"><i class="fa fa-toggle-on fa-4x"></i></a>

				
				
				<i class="text-danger fa fa-toggle-on fa-4x"></i>
				
				
				<i class="text-primary fa fa-pencil-square-o fa-4x"></i>
				
				<i class="text-danger fa fa fa-trash-o fa-4x"></i>
			*/
			?>
		</table>
		</div>

<!----------------------------------------------------------------------------------------- -->
			<ul class="pagination  pagination-lg col-sm-offset-6">
			  <li><a href="#">1</a></li>
			  <li><a href="#">2</a></li>
			  <li><a href="#">3</a></li>
			  <li><a href="#">4</a></li>
			  <li><a href="#">5</a></li>
			</ul>
<?php include "include/footer.php" ;?>
