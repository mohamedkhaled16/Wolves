<?php 
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
 require_once __DIR__."/include/header.php" ;

  $result=$admin->select_products();
  $res_all=$admin->select_products_All();
  $total_records = count($res_all);  //count number of records
  $total_pages = ceil($total_records / $GLOBALS['num_rec_per_page']); 
?>

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
window.location.href = "add-product.php?PID="+PID;

}

</script>

<!-- ---------------------------------------------------------------------------- -->

<div class="container">
<div class="row">

	<div class="col-sm-3">
		<h1>All Products</h1> 
	</div>
	
	<div class="col-sm-3">
   <h4><a href="add-product.php">Add Proudct</a></h4> 
  </div>
</div>
<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered table-condensed table-hover">
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
				echo "<td><img class='img-rounded img-responsive thumb'  src='uploads/$image' ></td>";
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
		</div></div>

<!----------------------------------------------------------------------------------------- -->

			<ul class="pagination  pagination-lg col-sm-offset-6">
			<?php
           /// echo " <li ";
           // if($GLOBALS['page']==1){echo " class='active'" ; }
            //echo "><a href='all-products.php?page=1'>first page</a></li>";  
      for ($i=1; $i<=$total_pages; $i++) { 
            echo " <li ";
            if($i==$GLOBALS['page']){echo " class='active'" ; }
            echo "><a href='all-products.php?page=$i' >$i</a></li>";  
      }
      //    echo " <li ";
       //   if($total_pages==$GLOBALS['page']){echo " class='active'" ; }
         // echo"><a href='all-products.php?page=$total_pages'>last page</a></li>";  

?>
			</ul>
<?php include "include/footer.php" ;?>
