<!-- Wolves cafeteria team prject Author:Mostafa Abd EL Fattah -->
<?php 
    include "include/header.php";
 ?>
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
<?php  if(isset($_POST['submit'])){
        $name=$_POST['name'];   
        $email=$_POST['email'];   
        $password=$_POST['password'];   
        $cpassword=$_POST['cpassword'];   
        $roomNo=$_POST['roomNo'];   
        $ext=$_POST['ext'];   
        $error='';
        if(empty($name)){
            $error.="Please Enter your Name <br/>";
        }
        if(empty($email)){
          $error.="Please Enter your email <br/>";
        }else{
          // $reg='/^[a-zA-Z_.0-9]+@[a-z0-9]+\.[a-z]{2,3}|\.[a-z]{2}$/i';  
           //$v=preg_match($reg,trim($email));
           //if(!preg_match($reg,trim($email)))
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
              $error.="Please Enter your email not validate <br/>";
            }else{
              $res=$admin->checkEmail($email);
               if($res==1){
                $error.="This Email Exist <br/>";
               }
            }

        }
        if(empty($password)){
          $error.="Please Enter your password <br/>";
        }
        if(empty($cpassword)){
          $error.="Please Enter your confirm password <br/>";
        }
        if(empty($roomNo)){
          $error.="Please Enter your room no <br/>";
        }if(empty($ext)){
          $error.="Please Enter your ext <br/>";
        }
       $accepted_image_types = array("image/gif", "image/jpg", "image/jpeg", "image/pjpeg", "image/png", "image/x-png");
       if(!empty($_FILES['imageuser']['tmp_name'])){
        if ($_FILES['imageuser']['error'] > 0)
        {
        switch ($_FILES['imageuser'][‘error’])
        {
        case 1: $error.= 'File exceeded upload_max_filesize';
        break;
        case 2: $error.= 'File exceeded max_file_size';
        break;
        case 3: $error.= 'File only partially uploaded';
        break;
        case 4: $error.= 'No file uploaded';
        break;
        case 6: $error.= 'Cannot upload file: No temp directory specified';
        break;
        case 7: $error.= 'Upload failed: Cannot write to disk';
        break;
        }
        echo $_FILES['imageuser']['type'];
            }elseif (!in_array($_FILES['imageuser']['type'], $accepted_image_types ))
        {
        $error.= 'Problem: file is not type';
        #exit;
        }
          }
        if(!empty($error)){
        echo "<p class='result alert-danger' style='display:block'>".$error."<br/><a href='add-user.php'>Please try again</a></p>";
        }else{
          echo "<div class='alert-danger result'  style='display:block'> ";
          if (is_uploaded_file($_FILES['imageuser']['tmp_name']))
          {
            $nameimg = time().$_FILES['imageuser']['name'];
            $Filename = 'uploads/'.$nameimg;
            if (!move_uploaded_file($_FILES['imageuser']['tmp_name'], $Filename))
            {
            echo 'Problem: Could not move file to destination directory';
            exit;
            }
          }
          $password = md5($password);

          //adding user data
          
           $data =array("name"=>"{$name}","email"=>"{$email}","password"=>"{$password}","image"=>"{$nameimg}","room_no"=>"{$roomNo}","ext"=>"{$ext}","user_type"=>'user');
          $result=$admin->insert_user($data);  
          if ($result != false) {    
            echo "<p class='alert-danger result' style='display:block'>user added thanks</p>";
         }else{
          echo"<p class='alert-danger result' style='display:block'> cant add this user</p>";
         }
   }
   echo"<p class='clearfix'></p>";
 }else{ ?>
        <form class="form-horizontal" role="form" method ="post" onsubmit="if(checkuser()!=1){return false}" id="adduser" action="add-user.php" enctype="multipart/form-data">
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
                    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
     <!---               <input type="submit" value="Save" id="submit" name="submit"  onclick="if(checkuser()){  $('#adduser').submit();}" class="btn btn-success"/>-->
                    <input type="submit" value="Save" id="submit" name="submit"   class="btn btn-success"/>

                    <input type="Reset"   value="Reset"   class="btn btn-danger"/>

                </div>
            </div>
        </form>
    </div>
</div>
<?php } //end else?>
<?php include "include/footer.php"; ?>

