<?php include("include/header.php"); ?>
<div class="container page-header " style="min-height:400px;" >
  <h1 class="text-left">Checks </h1>
  <hr/>
  <?php if($_SESSION['usertype']=='admin'){ 
    $order=$shared->getTotals();
    ?>
        <table class="table table-striped text-left">
     <tr>
       <th>Name</th>
       <th>Total Amount</th>
     </tr>
  <?php
    foreach ($order as $data) {
    $order_details=$shared->getTotalsDetailsByUID($data['user_id']);
    //var_dump($order_details);

?>
     <tr onclick="$('#tr_<?php echo $data['user_id']?>').slideToggle();" class='tr'>
       <td><?php echo $data['name']?></td>
       <td><?php echo $data['TotalAmount']?></td>
     </tr>
     <tr style="display:none" id="tr_<?php echo $data['user_id']?>">
       <td colspan="5">
       <table class="table table-striped text-left prod table-hover table-bordered table-condensed">
		     <tr>
		       <th>Date</th>
		       <th>Amount</th>
		     </tr>
         <?php
             $total=0;
            foreach ($order_details as $prod) { 
            
            
              //$total +=$prod['orders.date'] *$prod['product_count'] ;
              ?>
              
		     <tr>
		     	<td class="prod"><?php echo $prod['date']; ?></td>
		     	<td  class="prod"><?php echo $prod['TotalAmount'];?></td>
		     </tr>

    
           <?php }
 
         ?>
         </table>
       </td>
     </tr>

<?php    }
  ?>
     </table>

   
  <p class="clearfix"></p>
 <?php }else{
  echo "you dont have permission to this page";
  } ?>
</div>
<?php include("include/footer.php"); ?>
