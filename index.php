<?php

   include 'include/dblib.php'; 
   $db = new dbmethods();
   $data=$db->select("users","","");
   var_dump($data);
   echo $data[0]['user_id'];
   foreach ($data as $d) {
   	 echo "{$d['user_id']}";
   }

?>

