<?php 
    include "include/header.php";
    
    
$user_id="";
$name="";
$email="";
$password="";
$image="";
$room_no="";
$user_type="";
$ext="";
$status="";
    
if(isset($_GET['UID']) || !empty($_GET['UID']) )
		{
			$result=$admin->select_users_id($_GET['UID']);
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
						}
		
		
		
		}
		}
          
          
?>
 
<script type="text/javascript">
$(document).ready(function (e){
$("#DoAddUser").on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "ajax/do-add-user.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
$("#result").html(data);
},
error: function(){} 	        
});
}));
});
</script>
<!-- Creating the text -->
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-3	">
        <h1><code>Add user</code></h1>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4"></div>
</div>
<!-- Creating the form -->
<div class="row">
    <div class="container">
<div id="result"></div>
        <form class="form-horizontal" role="form" method ="post" id="DoAddUser" action="add-user.php" enctype="multipart/form-data">
        
<?php echo '<input  type="hidden" class="form-control col-lg-9" id="user_id" name="user_id" value="'.$user_id.'" required placeholder="user_id">'; ?>
      <!--      <div class="result"></div> -->
            <!-- Name -->   
            <div class="result alert-danger col-sm-10 col-sm-offset-2 pull-right"></div>
            <p class="clearfix"></p>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required value="<?php echo $name; ?>">
                </div>
            </div>
            <!-- Email -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email"  placeholder="Enter email" required value="<?php echo $email; ?>">
                </div>
           </div>
            <!-- Password -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10"> 
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password" >
                </div>
            </div>
            <!-- Confirm Password -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Confirm your password:</label>
                <div class="col-sm-10"> 
                    <input type="password" class="form-control" id="cpwd" name="cpassword" placeholder="Confirm your password">
                </div>
            </div>
            <!-- Room Number -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Room no:</label>
                <div class="col-sm-10"> 
                    <input type="text" class="form-control" id="roomNo" name="roomNo" placeholder="Enter room no." maxlength="4" required value="<?php echo $room_no; ?>">
                </div>
            </div>
            <!-- Ext -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Ext:</label>
                <div class="col-sm-10"> 
                    <input type="text" class="form-control" id="ext" name="ext" placeholder="Enter Ext no." maxlength="4" required value="<?php echo $ext; ?>">
                </div>
           </div>
            <!-- Img -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Profile picture:</label>
                <div class="col-sm-5"> 
                    <input type="file" class="form-control" name="imageuser" id="pic">
                </div>
                <div class="col-sm-5"> 
			<img style="width:100px;" class="img-rounded img-responsive"  src="<?php echo "uploads/".$image; ?>"/>
                </div>
            </div>
            <!-- Submit ** Reset -->              
            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" value="Save" id="submit" name="submit"   class="btn btn-success"/>
                    <input type="Reset"   value="Reset"   class="btn btn-danger"/>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include "include/footer.php"; ?>

