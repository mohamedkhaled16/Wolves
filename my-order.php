<?php include("include/header.php"); ?>
<div class="container page-header " style="min-height:400px;" >
  <h1 class="text-left">order </h1>
  <hr/>
  <?php if($_SESSION['usertype']=='user'){ 
      $order=$shared->getCurrentOrders_user_pagination();
      $res_all=$shared->getCurrentOrders_user();
      $total_records = count($res_all);  //count number of records
      $total_pages = ceil($total_records / $GLOBALS['num_rec_per_page']); 

    ?>
    <div class="search">
      <p>From: <input type="text" id="datepicker">
       To: <input type="text" id="datepicker2">
       <input type="button" name="search" value="Search" onclick="seach_order()">
       </p>
     
    </div>
    <div class="data">
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
     <tr  id="par_<?php echo $data['order_id']?>" class='tr'>
       <td onclick="$('#tr_<?php echo $data['order_id']?>').slideToggle();"><?php echo $data['date']?></td>
       <td onclick="$('#tr_<?php echo $data['order_id']?>').slideToggle();"><?php 
              if($data['status']=='delivered'){
                echo "Out for delivery" ;
              }else{
                echo $data['status'];
              }
             ?>   
            </td>
       <td><?php echo $total .' EGP '; ?></td>
       <td onclick="$('#tr_<?php echo $data['order_id']?>').slideToggle();">
           <?php if($data['status']=="processing"){
              echo "<a class='link' href='javascript:void(0)' onclick='cancleOrder(".$data['order_id'].")' >Cancle</a>";
             }
            ?>
       </td>
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
     <!--<h3 class="blue pull-right"><?php echo $all.'  EGP' ?></h3>-->

   
  <p class="clearfix"></p>
  <ul class="pagination  pagination-lg col-sm-offset-6">
      <?php
      for ($i=1; $i<=$total_pages; $i++) { 
            echo "<li ";
            if($i==$GLOBALS['page']){echo " class='active'" ; }
            echo "><a class='link' href='my-order.php?page=$i' >$i</a></li>";  
      }
?>
      </ul>
      </div>
      <p class="clearfix"></p>
 <?php }else{
  echo "you dont have permission to this page";
  } ?>
</div>
 <script type="text/javascript">
          function seach_order(){
            var startDate = new Date($('#datepicker').val());
            var endDate = new Date($('#datepicker2').val());

            if($("#datepicker2").val()== '' ||$("#datepicker").val()== ''){
              alert("please enter from date and to date");
            }else if(startDate > endDate ){
                alert("wrong date");
            }else{

              $.ajax({
               url:"ajax/search-myorder.php",
               method:'get',
              data:{
                "from":$("#datepicker").val(),
                "to":$("#datepicker2").val()
               },
              success:function(response){
                $('.data').html(response);        
              },
              complete:function(){
              }, cache: false,
              async:true
          });
 
            }

          }
      </script>
<script>
  $(function() {
   $( "#datepicker" ).datepicker({
     dateFormat: 'yy-mm-dd' 
   });
  $( "#datepicker2" ).datepicker({dateFormat: 'yy-mm-dd' });
  });
  </script>
<script type="text/javascript">
  function cancleOrder(id){
      $.ajax({
           url:"ajax/do-cancel-order.php",
           method:'get',
          data:{
            "id":id
           },
          success:function(response){
           if(response==1){
            $("#par_"+id+" td:nth-child(2)").html("cancled");
            $("#par_"+id+" td:last").html("");
           }         

          },
          complete:function(){
          }, cache: false,
          async:true
      });
  }
  $(function(){
     updateDate();
  });
  function updateDate(){
      $.ajax({
           url:"ajax/do-update-order.php",
           method:'get',
          data:{},
          success:function(response){
             for(var i=0;i<response.length;i++){
              $("#par_"+response[i].order_id+" td:last").html("");
               if(response[i].status=='delivered'){
                $("#par_"+response[i].order_id+" td:nth-child(2)").html("Out for delivery");
               }else{
                 $("#par_"+response[i].order_id+" td:nth-child(2)").html("Done");
                }
             }
             updateDate();   
          },
          complete:function(){
          }, cache: false,
          async:true,
          dataType:'json'
      });
  }
</script>
<?php include("include/footer.php"); ?>
