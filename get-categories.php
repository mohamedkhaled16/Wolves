<?php include "include/classes_header.php" ;

          $result=$admin->select_categories();
          
          echo '<option value="SelectPlease">Select Category</option>';
          if($result){
		foreach($result as $row) {

				$category_id=$row['category_id'];
				$category_name=$row['category_name'];	
				echo '<option value="'.$category_id.'">'.$category_name.'</option>';
			}

			}



?>

