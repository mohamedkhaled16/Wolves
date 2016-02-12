<?php include("include/header.php"); ?>
<div class="container page-header " style="min-height:400px;" >
  <h1 class="text-left">orders</h1>
  <?php
  	  $data=$order->selectProducts() ;
  	    	  print_r($data);

   ?>
  <div class="col-md-3 pull-left left_order"></div>
  <div class="col-md-8 pull-right right_order">
  	
  </div>
  <p class="clearfix"></p>
</div>
<?php include("include/footer.php"); ?>
