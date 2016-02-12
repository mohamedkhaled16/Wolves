<!-- wolves teams cafeteria -> Author:Mostafa abd El Fattah -->
<!-- Fill mysql info down -->


<?php  if(isset($_POST['submit'])){
        $name=$_POST['name'];   
        $email=$_POST['email'];   
        $password=$_POST['password'];   
        $cpassword=$_POST['cpassword'];   
        $roomNo=$_POST['roomNo'];   
        $ext=$_POST['ext'];   
        $error='';
        $NewID=$_POST["ID"];
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
                                        }/*else{
                                              $res=$admin->checkEmail($email);
                                              if($res==1){
                                                    $error.="This Email Exist <br/>";
                                                        }
                                              }*/

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
                                                                                    }//else
                                                                                  }//finla if          
///////////////New data from here . .  .. . . . . . . . . . . . .  . . . . . . . . . . . . ..

     //     $id_val=$_GET['id'];
       
      // AND NOW UPDATING THE VALUES INTO THE TABLE

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
////////////////////////////////////////////////////////////////////////////
       //updating the data now user data
          // image='".$nameimg."',
  $sqlupdate= "UPDATE users SET name='".$name."', email='".$email."', password='".$password."', room_no='".$roomNo."', ext='".$ext."' WHERE user_id = $NewID ";

  

if ($DBconn->query($sqlupdate) === TRUE) {
            echo "user added thanks";
} else {
              echo "cant add this user" . $DBconn->error;
}

$DBconn->close(); 
//to redirct to the same page
     include("all-user.php");

?>