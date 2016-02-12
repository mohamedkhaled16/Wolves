<?php 
    include "include/header.php";
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
      <!--      <div class="result"></div> -->
            <!-- Name -->   
            <div class="result alert-danger col-sm-10 col-sm-offset-2 pull-right"></div>
            <p class="clearfix"></p>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
            </div>
            <!-- Email -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email"  placeholder="Enter email">
                </div>
           </div>
            <!-- Password -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10"> 
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password">
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
                    <input type="text" class="form-control" id="roomNo" name="roomNo" placeholder="Enter room no." maxlength="4">
                </div>
            </div>
            <!-- Ext -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Ext:</label>
                <div class="col-sm-10"> 
                    <input type="text" class="form-control" id="ext" name="ext" placeholder="Enter Ext no." maxlength="4">
                </div>
           </div>
            <!-- Img -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Profile picture:</label>
                <div class="col-sm-10"> 
                    <input type="file" class="form-control" name="imageuser" id="pic">
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

