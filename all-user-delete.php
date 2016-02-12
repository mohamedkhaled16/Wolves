<?php
$id_val=$_GET['id'];

// AND NOW Deleting a specific row from the table

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
     /////////////////////////////////////////////////////
     //Then Deleting from the other table

     $sqldelU="DELETE FROM users WHERE user_id=$id_val";

     if ($DBconn->query($sqldelU) === TRUE) {
      # code...
      echo "ROW DELETED SUCCESSFULLY";
     }else {
      echo "ERROR DELTING THE ROW:" . $DBconn->error;
     }

     //close the connection

     $DBconn->close();

     //to redirct to the same page
     include("all-user.php");

?>