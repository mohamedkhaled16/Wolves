<?php 
   

   include __DIR__."/../include/classes_header-login.php";
   require '../MailGun/vendor/autoload.php';
   use Mailgun\Mailgun;
   

	$email="";

        $error='empty';

	if(!isset($_POST['email']) || empty($_POST['email']) ){$error.="Please Enter email";}
		else {$email=$_POST['email']; }
	


        if($error != "empty"){

        echo $error;
        }else{
        echo "Reset Password Email had been sent";
        //check email
        //add new record
        //send email
        //handel email 
           $data =array("email"=>"{$email}");
          $result=$shared->checkEmailForgetPass($email);  
          //var_dump($result);
          
          if ($result != false) { 
          $UID="";
          foreach($result as $row) {
          $row[user_id];
          }
          $hash = md5(rand(0,1000).time()."Hello I'm Mk");
          $date=date('Y-m-d h:i:s');
            $data =array("UID"=>"{$row[user_id]}" , "secret"=>"{$hash}" , "status"=>"active", "date"=>"{$date}");
            
            
            $result=$shared->insert_ResetPass($data);
           // echo "done";
            
     ////// send mail using Mail GUN       
          //echo 'MailGun/vendor/autoload.php';
	

		# Instantiate the client.
		$mgClient = new Mailgun('******');
		$domain = "******";

		# Make the call to the client.
		$result = $mgClient->sendMessage("$domain",
				  array('from'    => 'Mailgun Sandbox <postmaster@.mailgun.org>',
				        'to'      => $row[name].'<'.$row[email].'>',
				        'subject' => 'Reset Password',
				        'text'    => 'Hello '.$row[name].', <br> you just requested reset Password <br>Please use the below URL to reset the password Or neglect .. note : url is valid for the next hour only... <br> http://wolves-cafeteria.rhcloud.com/reset-password.php?code='.$hash));
           
            
          
          //SEnd MAIL USING SENDGRID
          
          require("../SendGrid/sendgrid-php.php");


/* USER CREDENTIALS
/  Fill in the variables below with your SendGrid
/  username and password.
====================================================*/
$sg_username = "******";
$sg_password = "******";

//"IuRHZthybh", "iti@1331992"
/* CREATE THE SENDGRID MAIL OBJECT
====================================================*/
$sendgrid = new SendGrid( $sg_username, $sg_password );
$mail = new SendGrid\Email();




/* SEND MAIL
/  Replace the the address(es) in the setTo/setTos
/  function with the address(es) you're sending to.
====================================================
'to'      => $row[name].'<'.$row[email].'>',
				        'subject' => 'Reset Password',
				        'text'    => 'Hello '.$row[name].', \n \n you just requested reset Password \n\n Please use the below URL to reset the password Or neglect .. note : url is valid for the next hour only... \n \n
				        http://wolves-cafeteria.rhcloud.com/update-pass.php
				        '

*/

try {
    $mail->
    //setFrom( "eng.mohamed16@yahoo.com" )->
    setFrom( "emohamed16457@sendgrid.com" )->
    addTo( $row[email] )->
    setSubject( 'Reset Password' )->
    setText( 'Hello '.$row[name].', \n \n you just requested reset Password \n\n Please use the below URL to reset the password Or neglect .. note : url is valid for the next hour only... \n \n http://wolves-cafeteria.rhcloud.com/reset-password.php?code='.$hash );
    
    $response = $sendgrid->send( $mail );

    if (!$response) {
        throw new Exception("Did not receive response.");
    } else if ($response->message && $response->message == "error") {
        throw new Exception("Received error: ".join(", ", $response->errors));
    } else {
       // print_r($response);
    }
} catch ( Exception $e ) {
    var_export($e);
}
          
            
            
         }else{
          echo"DB Error";
         }
   }


  



?>
