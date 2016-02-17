<?php include("include/header.php"); ?>
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
  <?php if($_SESSION['usertype']=='admin'){ 
    $order=$shared->getTotals_pagination();
    $res_all=$shared->getTotals();
    $total_records = count($res_all);  //count number of records
     $total_pages = ceil($total_records / $GLOBALS['num_rec_per_page']); 

    ?>
        <table class="table table-striped text-left">
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
<?php include("include/footer.php"); ?>
