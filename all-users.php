<?php 
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
 require_once __DIR__."/include/header.php" ;

  $result=$admin->select_users_pagination();
  $res_all=$admin->select_users();
  $total_records = count($res_all);  //count number of records
  $total_pages = ceil($total_records / $GLOBALS['num_rec_per_page']); 

?>

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




<div class="container">
<div class="row">

	<div class="col-sm-3">
		<h1>All users</h1> 
	</div>
	<div class="col-sm-2">
   <h4><a href="add-user.php">add user</a></h4> 
  </div>
</div>
<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered table-condensed table-hover">
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
		</div>

<!----------------------------------------------------------------------------------------- -->
			<ul class="pagination  pagination-lg col-sm-offset-6">
               <?php
                   for ($i=1; $i<=$total_pages; $i++) { 
                   echo " <li ";
                     if($i==$GLOBALS['page']){echo " class='active'" ; }
                    echo "><a href='all-users.php?page=$i' >$i</a></li>";  
                    }

               ?>
			</ul>
<?php include "include/footer.php" ;?>
