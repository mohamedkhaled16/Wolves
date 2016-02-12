<?php include("include/header.php"); ?>
<div class="container page-header " style="min-height:400px;" >
  <h1 class="text-left">orders</h1>
  <?php if($_SESSION['usertype']=='user'){ ?>
  <?php
  	  $data=$order->selectProducts() ;
      $room=$shared->selectUsersRooms() ;
   ?>
  <div class="col-md-3 pull-left left_order">
     <h3>orders</h3>
     <hr/>
     <form id="user_order">
       <ul id="orders" class="col-md-12"></ul> 
       <div class="nodes">
         <textarea class="nodes form-control" ></textarea><br/>
       </div>
       <select class="form-control" >
         <option value="">room number</option>
         <?php foreach ($room as $no) { ?>
         <option value="<?php echo $no['room_no'] ?>"><?php echo $no['room_no'] ?></option>
        <?php  } ?>
       </select>
      <hr/>
      <input type="button" class="btn btn-primary" name="confirm" value="Confirm" id="button"/>
    </form>
  </div>
  <div class="col-md-9 pull-right right_order">
  	<?php 
      foreach ($data as $prod) {
     ?>
      <div class="col-md-3 col-xs-6 prod" data="<?php echo $prod['product_name'] ;?>" id="prod_<?php echo $prod['product_id'] ;?>" onclick="addproduct(<?php echo $prod['product_id'] ;?>)"> 
           <span class="badge" id="price_<?php echo $prod['product_id'] ;?>" data="<?php echo $prod['product_price'] ;?>"><?php echo $prod['product_price'] ;?> L.E </span>
           <img src="uploads/<?php echo $prod['image'] ;?>" />
           <h3><?php echo $prod['product_name'] ;?></h3>
      </div>
     <?php } ?>
  </div>
  <p class="clearfix"></p>
 <?php }else{echo "you dont have permission to this page";} ?>
</div>
<script type="text/javascript">
  function addproduct (id) {
    if($("#orders #order_pro_" + id).length == 0) {
      var pro_name=$("#prod_"+id).attr("data");
      var price=$("#price_"+id).attr("data");
      $("#orders").append("<li id='order_pro_"+id+"'><span id='pro_name_"+id+"' class='col-md-4'>"+pro_name+"</span><span id='count_"+id+"' class='col-md-1'>1</span><span class='col-md-2'><span class='glyphicon glyphicon-plus col-md-12' onclick='incremaent("+id+")'></span><span class='glyphicon glyphicon-minus col-md-12'  onclick='decremaent("+id+")'></span></span><span class='col-md-4' id='price_pro_"+id+"'>"+price+" EGP</span><span class='glyphicon glyphicon-trash col-md-1'  onclick='deleteli("+id+")'></span><p class='clearfix'></p></li>");
    }
  }
  function decremaent(id){
    var count=$("#count_"+id).text();
    if(count!='1'){
     count=parseInt(count)-1;
    }
    $("#count_"+id).text(count);
  }
  function incremaent(id){
    var count=$("#count_"+id).text();
     count =parseInt(count)+1;
    $("#count_"+id).text(count);
  }
  function deleteli(id){
    $('#order_pro_'+id).remove();
  }
</script>
<?php include("include/footer.php"); ?>
