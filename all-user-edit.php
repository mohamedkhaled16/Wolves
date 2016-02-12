<!-- Wolves cafeteria team project Author:Mostafa Abd EL Fattah -->
<?php 
    include "include/header.php";
 ?>

<?php 
      $id_val=$_GET['id'];

      //Figure out the errors

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


      // Define the constant variable for mysql
          $servername = "localhost";
          $username = "";
          $password = "";
          $dbName = "cafeteria";

     //Open a new connection 
      $DBconn = new mysqli($servername, $username, $password, $dbName);

     //check for the connection
    if ($DBconn->connect_error) {
     die("Connection to $dbName failed:" . $DBconn->connect_error);
     }
////////////////////////////////////////////////////////////////////////////////////////////
      // SELECT VALUES FROM THE TABLE 
  $sqlrow = "SELECT * FROM users WHERE user_id = $id_val";
  $ROWcontent = $DBconn->query($sqlrow); //as it will return array of row


  if ($ROWcontent->num_rows > 0) {
    // output data of each row
    while($row = $ROWcontent->fetch_assoc()) {
      
        $names=$row['name'];   
        $emails=$row['email'];   
        $passwords=$row['password'];   
        $roomNos=$row['room_no'];   
        $exts=$row['ext'];
        $imgs=$row['image'];

    }
} else {
    echo "0 results";
}


/////////////////////////////////////////////////////////////////
//Updating the data check for every thing new

  
           //End of the connection
           $DBconn->close();
   ?>    
  <!-- Creating the text -->

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6  ">
        <h1><code>Edit user : "<?php echo "$names";  ?>" </code></h1>
    </div>
    <div class="col-sm-3"></div>
    <div class="col-sm-2"></div>
</div>
<!-- Creating the form -->
<div class="row">
    <div class="container">
    <!-- /********************************************************************************* -->  
        <form class="form-horizontal" role="form" method ="post" onsubmit="if(checkuser()!=1){return false}" id="adduser" action="all-user-edit-update.php" enctype="multipart/form-data">
      <!--      <div class="result"></div> -->
            <!-- Name -->   
            <div class="result alert-danger col-sm-10 col-sm-offset-2 pull-right"></div>
            <p class="clearfix"></p>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $names ?>">
                </div>
            </div>
            <!-- Email -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email"  value="<?php echo $emails ?>">
                </div>
           </div>
            <!-- Password -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10"> 
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter new password">
                </div>
            </div>
            <!-- Confirm Password -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Confirm your password:</label>
                <div class="col-sm-10"> 
                    <input type="password" class="form-control" id="cpwd" name="cpassword" placeholder="Confirm your new password">
                </div>
            </div>
            <!-- Room Number -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Room no:</label>
                <div class="col-sm-10"> 
                    <input type="text" class="form-control" id="roomNo" name="roomNo" value="<?php echo $roomNos ?>" maxlength="4">
                </div>
            </div>
            <!-- Ext -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Ext:</label>
                <div class="col-sm-10"> 
                    <input type="text" class="form-control" id="ext" name="ext" value="<?php echo $exts ?>" maxlength="4">
                </div>
           </div>
            <!-- Img -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Profile picture:</label>
                <div class="col-sm-10"> 
                    <input type="file" class="form-control" name="imageuser" id="pic">
                    <input type="hidden"
                                                   name="ID"
                                                   size="30"
                                                   maxlentgh="40"
                                                   value="<?php echo "$id_val"; ?>" />
                </div>
            </div>
            <!-- Submit ** Reset -->              
            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
     <!---               <input type="submit" value="Save" id="submit" name="submit"  onclick="if(checkuser()){  $('#adduser').submit();}" class="btn btn-success"/>-->
                    <input type="submit" value="Save" id="submit" name="submit"   class="btn btn-success"/>

                    <input type="Reset"   value="Reset"   class="btn btn-danger"/>

                </div>
            </div>
        </form>
    </div>
</div>

<?php include "include/footer.php"; ?>

