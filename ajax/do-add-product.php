<?php 
   
   error_reporting(0);
ini_set('display_errors', 1);
   include "include/classes_header.php";
   

  



	$product_name="";
	$product_price="";
	$category_id="";
	$status="unavailable";
	$display="yes";
	$Filename = "";
        $error='';

	if(!isset($_POST['product_name']) || empty($_POST['product_name']) ){$error.="Please Enter Proudct Name <br/>";}
		else {$product_name=$_POST['product_name']; echo "Wrong";}
	if(!isset($_POST['product_price']) || empty($_POST['product_price']) ){$error.="Please Enter Proudct Price <br/>";}
		else {$product_price=$_POST['product_price']; }
	if(!isset($_POST['category_id']) || empty($_POST['category_id']) ){$error.="Please Select Proudct Category <br/>";}
		else {$category_id=$_POST['category_id']; }
		
	$accepted_image_types = array("image/gif", "image/jpg", "image/jpeg", "image/pjpeg", "image/png", "image/x-png");
	if(is_uploaded_file($_FILES['proudct_image']['tmp_name']) && is_array($_FILES)) {
       if(!empty($_FILES['proudct_image']['tmp_name'])){
		if ($_FILES['proudct_image']['error'] > 0)
		{
			switch ($_FILES['proudct_image'][‘error’])
			{
			case 1: $error.= 'File exceeded upload_max_filesize';
			break;
			case 2: $error.= 'File exceeded max_file_size';
			break;
			case 3: $error.= 'File only partially uploaded';
			break;
			case 4: $error.= 'No file uploaded';
			break;
			case 6: $error.= 'Cannot upload file: No temp directory specified';
			break;
			case 7: $error.= 'Upload failed: Cannot write to disk';
			break;
			}
			//	echo $_FILES['proudct_image']['type'];
			    }
		elseif (!in_array($_FILES['proudct_image']['type'], $accepted_image_types ))
		{
			$error.= 'Problem: file is not image';
			#exit;
		}
          }else {$error.="Please Add Image...";}}
          else {$error.="Please Add Image...";}
	


        if(!empty($error)){
        echo '<div class="alert alert-danger"><strong>Error!</strong>';
        echo $error;
        echo '</div>';
        }else{
          if (is_uploaded_file($_FILES['proudct_image']['tmp_name']))
          {
            $nameimg = time().$_FILES['proudct_image']['name'];
            $Filename = 'uploads/'.$nameimg;
            if (!move_uploaded_file($_FILES['proudct_image']['tmp_name'], $Filename))
            {
            echo '<div class="alert alert-danger"><strong>Error!</strong>';
            echo 'Problem: Could not move file to destination directory';
            echo '</div>';
            exit;
            }
          }
           $data =array("product_name"=>"{$product_name}","product_price"=>"{$product_price}","category_id"=>"{$category_id}","status"=>"{$status}","display"=>"{$display}","image"=>"{$Filename}");
         var_dump($data);
          $result=$admin->insert_product($data);  
          if ($result != false) {    
            echo '<div class="alert alert-success"><strong>Success!</strong> User had benn added...</div>';
         }else{
		 echo '<div class="alert alert-danger"><strong>Error!</strong>';
		 echo"Can't add this user...";
		 echo '</div>';
		  array_map('unlink', glob($Filename)); 
         }
   }






?>
