<?php include("include/header.php"); ?>
<div class="container page-header " style="min-height:400px;" >
  <h1 class="text-left">orders</h1>
  <?php
  	  $data=$order->selectProducts() ;
   ?>
  <div class="col-md-3 pull-left left_order"></div>
  <div class="col-md-8 pull-right right_order">
  	<?php 
      foreach ($data as $prod) {
     ?>
      <div class="col-md-3"> 
           
      </div>
     <?php } ?>
  </div>
  <p class="clearfix"></p>
</div>
<?php include("include/footer.php"); ?>
