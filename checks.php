<?php include("include/header.php"); 
$users=$shared->selectUsers();
?>
<script>

function getChecksDetails(UID){

$.post("ajax/get-checks-details.php",
    {
        user_id: UID
    },
    function(data, status){
    //alert(data+"status"+status);
    if(status == "success"){
    //alert(PID);
    $('#checksdetails').html(data);
   // $('#checksdetails').slideToggle();
    $('#checksdetails').show();
    }

    });
}



function getChecksProducts(OID){

$.post("ajax/get-checks-products.php",
    {
        order_id: OID
    },
    function(data, status){
    //alert(data+"status"+status);
    if(status == "success"){
    //alert(OID);
    $('#checksproducts').html(data);
   // $('#checksproducts').slideToggle();
    $('#checksproducts').show();
    }

    });
}
</script>
<div class="container page-header " style="min-height:400px;" >
  <h1 class="text-left">Checks </h1>
  <hr/>
  <div class="search col-lg-9 col-md-6 col-sm-5 form-inline">
      <p>From: <input class="form-control inline" type="text" id="datepicker">
       To: <input class="form-control inline" type="text" id="datepicker2">
       User:  <select class="form-control inline" name="userid" id="user_id">
         <option value="">choose</option>
          <?php 
              foreach ($users as $user) {
                  echo" <option value='".$user['user_id']."'>".$user['name']."</option>";
              }          
          ?>
         </select>
       <input type="button" name="search" value="Search" onclick="seach_checks()">
       </p>
     
    </div>
  <?php if($_SESSION['usertype']=='admin'){ 
    $order=$shared->getTotals_pagination();
    $res_all=$shared->getTotals();
    $total_records = count($res_all);  //count number of records
     $total_pages = ceil($total_records / $GLOBALS['num_rec_per_page']); 

    ?>
        <table class="table table-striped text-left" id="mkvalues">
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
  ?>
  
     </table>
<div style="display:none" id="checksdetails">

</div>   


<div style="display:none;" id="checksproducts">

</div>   
  <ul class="pagination  pagination-lg col-sm-offset-6">
               <?php
                   for ($i=1; $i<=$total_pages; $i++) { 
                   echo " <li ";
                     if($i==$GLOBALS['page']){echo " class='active'" ; }
                    echo "><a href='checks.php?page=$i' >$i</a></li>";  
                    }

               ?>
      </ul>
  <p class="clearfix"></p>

 <?php }else{
  echo "you dont have permission to this page";
  } ?>
</div>

 <script type="text/javascript">
          function seach_checks(){
          FilterDateFlag = "false";
          FilterUIDFlag = "false";
            var startDate = new Date($('#datepicker').val());
            var endDate = new Date($('#datepicker2').val());
            var UID = $("#user_id").val();

            if(startDate != '' && endDate != '' && startDate < endDate){
              
              FilterDateFlag = "true";
            }
            
            if(UID != ""){
            	FilterUIDFlag = "true";
            }
            
            
            
            if(FilterDateFlag == "false" && FilterUIDFlag == "false"){
            	alert("Please fill one of the option to filter using it...");
            }
            /*else if(FilterDateFlag == "flase"){
            	alert("Please enter a valid dates ...");
            }*/
            else {

              $.ajax({
               url:"ajax/search-checks.php",
               method:'post',
              data:{
                "from":$('#datepicker').val(),
                "to":$('#datepicker2').val(),
                "UID":UID
               },
              success:function(response){
                $("#mkvalues").html(response);        
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
<?php include("include/footer.php"); ?>
