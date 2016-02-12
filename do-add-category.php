<?php 
   
   error_reporting(0);
ini_set('display_errors', 1);
   include "include/classes_header.php";
   
	$category_name="";

        $error='';

	if(!isset($_POST['category_name']) || empty($_POST['category_name']) ){$error.="Please Enter Category Name <br/>";}
		else {$category_name=$_POST['category_name']; }
	


        if(!empty($error)){

        echo $error;
        }else{
           $data =array("category_name"=>"{$category_name}");
          $result=$admin->insert_category($data);  
          if ($result != false) {    
            echo "1";
         }else{
          echo"DB Error";
         }
   }






?>
