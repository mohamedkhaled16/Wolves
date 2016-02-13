<?php 
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
 require_once __DIR__."/include/header.php" ;

          $result=$admin->select_users();
          
?>
<!--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script>

function deleteUser(UID){

$.post("ajax/do-crud-user.php",
    {
        user_id: UID,
        delete_p: "delete_p"
    },
    function(data, status){
    //alert(data+"status"+status);
    if(status == "success"){
    //alert(UID);
    $('#row'+UID).remove();
    }

    });
}

function editUser(UID){
window.location.href = "add-user.php?UID="+UID;
}

</script>

<!-- ---------------------------------------------------------------------------- -->
<div>
	<h1> All Users</h1>
	<a href="add-products.html" align="left">Add User</a> 

</div>
<div class="table-responsive">
			<table class="table table-hover table-bordered table-condensed table-hover">
			<tr>
                <th>Name</th>
				<th>Room</th>
				<th style="width:200px" width="200">Image</th>
				<th>Ext</th>
				<th style="width:300px" width="300">Action</th>

			</tr>
			<?php
			
			          if($result){
		foreach($result as $row) {
				$user_id=$row['user_id'];
				$name=$row['name'];
				$email=$row['email'];
				$password=$row['password'];
				$image=$row['image'];
				$room_no=$row['room_no'];
				$user_type=$row['user_type'];
				$ext=$row['ext'];
				$status=$row['status'];
				echo "<tr id='row$user_id'>";
				echo "<td>$name</td>";
				echo "<td>$room_no</td>";
				echo "<td><img style='width:200px' class='img-rounded img-responsive'  src='uploads/$image'></td>";
				echo "<td>$ext</td>";
				echo '<td>';
				echo '<a href="javascript:void(0);" class="text-primary" onclick="editUser('.$user_id.')" id="edit'.$user_id.'"><i class="fa fa-pencil-square-o fa-3x"></i></a>';
				echo '<a href="javascript:void(0);" class="text-danger" onclick="deleteUser('.$user_id.')" id="delete'.$user_id.'"><i class="fa fa-trash-o fa-3x"></i></a>';
				echo '</td>';	
				echo "</tr>";
			}

			}
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
