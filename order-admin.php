<?php include("include/header.php"); ?>
<div class="container page-header " style="min-height:400px;" >
  <h1 class="text-left">order </h1>
  <?php if($_SESSION['usertype']=='admin'){ ?>
  <?php
      $data=$order->selectProducts() ;
      $room=$shared->selectUsersRooms() ;
      $users=$shared->selectUsers();
   ?>
    <div class="result error"></div>

  <div class="col-md-3 pull-left left_order">
     <h3>orders</h3>
     <hr/>

     <form id="send_user_order" method="post">
       
       <ul id="orders" class="col-md-12"></ul> 
       <div class="nodes">
         <textarea class="nodes form-control" name="nodes"></textarea><br/>
       </div>
       <select class="form-control" name="room_number" id="room_number">
         <option value="">room number</option>
         <?php foreach ($room as $no) { ?>
         <option value="<?php echo $no['room_no'] ?>"><?php echo $no['room_no'] ?></option>
        <?php  } ?>
       </select>
      <hr/>
      <div id="total"></div>
      <input type="button" class="btn btn-primary" name="confirm" value="Confirm" onclick="sendOrder()" id="button"/>
    </form>
  </div>
  <div class="col-md-9 pull-right right_order">
  <div class="form-group">
      <label class="col-md-3">add user</label>
      <select class="form-control col-md-3" name="user_id" id="user_id" style="width:200px;">
          <option value="">choose</option>
          <?php 
              foreach ($users as $user) {
                  echo" <option value='".$user['user_id']."'>".$user['name']."</option>";
              }          
          ?>
         </select>
     </div>
     <p class="clearfix"></p>
     <hr/>
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
  function calculateall(){
    var priceall=0;
    $("#orders li").each(function(){
      var id=$(this).attr('data');
      var p=$("#price_pro_"+id).attr('data');
      var c=$("#count_"+id).text();
      var to=parseInt(p)*parseInt(c);
      priceall +=to;
      $("#total").html(priceall+" EGP");
    });
  } 
  function addproduct (id) {
    if($("#orders #order_pro_" + id).length == 0) {
      var pro_name=$("#prod_"+id).attr("data");
      var price=$("#price_"+id).attr("data");
      $("#orders").append("<li id='order_pro_"+id+"' data='"+id+"' ><span id='pro_name_"+id+"' class='col-md-4'>"+pro_name+"</span><span id='count_"+id+"' class='col-md-1 no_order'>1</span><span class='col-md-2'><span class='glyphicon glyphicon-plus col-md-12' onclick='incremaent("+id+")'></span><span class='glyphicon glyphicon-minus col-md-12'  onclick='decremaent("+id+")'></span></span><span class='col-md-4 price_order' id='price_pro_"+id+"' data='"+price+"'>"+price+" EGP</span><span class='glyphicon glyphicon-trash col-md-1'  onclick='deleteli("+id+")'></span><p class='clearfix'></p></li>");
      calculateall();
      
    }else{
      incremaent(id);
    }
  }
  function decremaent(id){
    var count=$("#count_"+id).text();
    var price=$("#price_"+id).attr("data");
    if(count!='1'){
     count=parseInt(count)-1;
     var total_pro=parseInt(price)*count;
      $("#count_"+id).text(count);
      $("#price_pro_"+id).text(total_pro+" EGP");
      $("#price_pro_"+id).attr('data',total_pro);
      calculateall();
    }
  }
  function incremaent(id){
    var price=$("#price_"+id).attr("data");
    var count=$("#count_"+id).text();
     count =parseInt(count)+1;
    var total_pro=parseInt(price)*count;
    $("#count_"+id).text(count);
    $("#price_pro_"+id).text(total_pro+" EGP");
    $("#price_pro_"+id).attr('data',total_pro);
     calculateall();
  }
  function deleteli(id){
    $('#order_pro_'+id).remove();
     calculateall();
  }
 

  function sendOrder(){
    $(".result").show();
    if($("#send_user_order #room_number").val()==''||$("#orders li").length==0||$("#user_id").val()==''){
        $(".result").html("<p class='error'>Please enter data<p>");   
    }else{
       var data=[];
       $("#orders li").each(function(){
          var id=$(this).attr('data');
          var c=$("#count_"+id).text();
          c=parseInt(c);
          var pro=$("#price_"+id).attr('data');
         var obj={'count':c,'id_prod':id,'price':pro};
          data.push(obj);
      });
       var user_id=$("#user_id").val();
       var data2 = $('#send_user_order').serializeArray();
       data2['orders']=data;
      //  console.log(data2);
       $.ajax({
          url: "ajax/do-add-admin-order.php",
          type: "POST",
          data:  $('#send_user_order').serialize()+"&orders="+JSON.stringify(data)+"&user_id="+user_id,
          success: function(e){
          $(".result").html(e);
          $("#total").html("");
          $("#orders").html("");
          $(".nodes").text("");
          },
          error: function(e){          }           
          });
    }
}
</script>
<?php include("include/footer.php"); ?>
