<?php 
   if ($_SERVER['HTTP_REFERER'] != "http://wolves-cafeteria.rhcloud.com/checks.php"){exit;}   
error_reporting(0);
ini_set('display_errors', 1);

     include __DIR__."/../include/classes_header.php";
     
$from =$_POST['from'];
$to=$_POST['to'];
$UID=$_POST['UID'];     
  
if(isset($_POST['from']) && !empty($_POST['from'])){
		$from =$_POST['from'];
		}

if(isset($_POST['to']) && !empty($_POST['to'])){
		$to =$_POST['to'];
		}

if(isset($_POST['UID']) && !empty($_POST['UID'])){
		$UID =$_POST['UID'];
		}				
		
  
     
 $order=$shared->getTotalsfiltration($from,$to,$UID);
    
//echo "fdsf";


    ?>
    <tbody>
      <tr>
       <th>Name</th>
       <th>Total Amount</th>
     </tr>
    <?php
    foreach ($order as $data) {

    //var_dump($order_details);

?>
     <tr onclick="getChecksDetails(<?php echo $data['user_id']; ?>)" class='tr'>
       <td><?php echo $data['name']?></td>
       <td><?php echo $data['TotalAmount']?></td>
     </tr>
     
<?php    }
  ?></tbody>
