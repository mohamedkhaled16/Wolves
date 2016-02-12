<!-- Wolves cafeteria project - Author:Mostafa Abd EL Fattah -->
<?php include "include/header.php" ;?>
<!-- Creating the text -->

<div class="row">
<div class="col-sm-1"></div>
	<div class="col-sm-3	">
		<h1><code>All users</code></h1> 
	</div>
	<div class="col-sm-6"></div>
	<div class="col-sm-2">
   <h3><a href="#">add user</a></h3> 
  </div>
</div>


<!-- Creating the table for all users -->
<div class="container">
  <table class="table table-striped table-bordered">
   
    <tr class="info" align="center">
        <td>Name</td>
        <td>Room</td>
        <td>Image</td> 
        <td>Ext</td>
        <td>Actions</td>
   </tr>
   <!-- Selecting the information from the data base into our table -->

   <?php 
       //Figure out the errors

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        //////////////*/*/*/*/*/*/*/*/*/*/*/*/*//
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

 // SELECT VALUES FROM THE TABLE 
  $sqlTB = "SELECT user_id, name, room_no, image, ext FROM users";
  $TBcontent = $DBconn->query($sqlTB); //as it will return array

if ($TBcontent->num_rows > 0) {  //check if the number of rows which is an attribute from mysql class
    // output data of each row //with fetch_assoc() we will put a key and value for each row
    
    $Total_Users=0;

    while($row = $TBcontent->fetch_assoc()) {
          
          //echo the data into the table

                 echo "<tr><td>".$row['name']."</td>"; 
                 echo "<td>".$row['room_no']. "</td>";
                 echo "<td>".$row['image']."</td>";
                 echo "<td>".$row['ext']."</td>";
                                                         ///getting the number of the elements
                 /*echo "<td><a href='UPDATE_mysql.php?id=".$row['UID']."' class='btn btn-success' role='button'>Edit</a>  <a href='delete_mysql.php?id=".$row['UID']."' class='btn btn-danger' role='button'>Delete</a></td>";*/

                 echo "<td><a href='all-user-edit.php?id=".$row['user_id']."' class='btn btn-success' role='button'>Edit</a>  <a href='all-user-delete.php?id=".$row['user_id']."' class='btn btn-danger' role='button'>Delete</a></td>";
 
                 $Total_Users=$Total_Users+1; 
           
           } //While
   } else {
       echo "0 results";
   }
      $DBconn->close(); 
    ?>


</table>
</div>

<!-- TO echo number of users -->
<div class="row"> 
        <div class="col-sm-5"></div>
        <div class="col-sm-2">
          
             <code>
          <?php
                //print the number of users
                echo "Total Number of users "."$Total_Users";
          ?>
          </code>
        </div>
          <div class="col-sm-5"></div>
        </div>




<!-- End -->

<!-- For Pagenation code -->
<footer align="center">
<nav>
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
<?php include "include/footer.php" ;?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     