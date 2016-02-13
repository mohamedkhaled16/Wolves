<?php include("include/header.php"); ?>
<div class="container page-header " style="min-height:400px;" >
  <h1 class="text-left">order </h1>
  <hr/>
  <?php if($_SESSION['usertype']=='user'){ 
    $order=$shared->getCurrentOrders_user();
    ?>
        <table class="table table-striped text-left">
     <tr>
       <th>Order Date</th>
       <th>status</th>
       <th>Amount</th>
       <th>Action</th>
     </tr>
  <?php
    $all=0;
    foreach ($order as $data) {
    $order_details=$shared->getOrdersDetails($data['order_id']);
    $total=0;
    foreach ($order_details as $prod) { 
      $total +=$prod['product_price'] *$prod['product_count'] ;
    }
    $all+=$total;
?>
     <tr onclick="$('#tr_<?php echo $data['order_id']?>').slideToggle();" class='tr'>
       <td><?php echo $data['date']?></td>
       <td><?php echo $data['status']?></td>
       <td><?php echo $total .' EGP '; ?></td>
       <td></td>
     </tr>
     <tr style="display:none" id="tr_<?php echo $data['order_id']?>">
       <td colspan="5">
         <?php
            foreach ($order_details as $prod) { 
              ?>
             <div class="col-md-2 col-xs-6 prod"> 
               <span class="badge" ><?php echo $prod['product_price'] ;?> L.E </span>
               <img src="uploads/<?php echo $prod['image'] ;?>" />
               <h3><?php echo $prod['product_name'] ;?></h3>
                <h3><?php echo $prod['product_count'] ;?></h3>
             </div>
           <?php }
           echo"<p class='clearfix'></p>";
           echo"<h3 class='blue pull-right'>total={$total} EGP</h3>";
         ?>
       </td>
     </tr>

<?php    }
  ?>
     </table>
     <h3 class="blue pull-right"><?php echo $all.'  EGP' ?></h3>

   
  <p class="clearfix"></p>
 <?php }else{
  echo "you dont have permission to this page";
  } ?>
</div>
<?php include("include/footer.php"); ?>
