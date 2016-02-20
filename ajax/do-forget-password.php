<?php 
   
   error_reporting(0);
ini_set('display_errors', 1);
   include __DIR__."/../include/classes_header-login.php";
   
	$email="";

        $error='empty';

	if(!isset($_POST['email']) || empty($_POST['email']) ){$error.="Please Enter email";}
		else {$email=$_POST['email']; }
	


        if($error != "empty"){

        echo $error;
        }else{
        
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
            
            
     ////// send mail using Mail GUN       
            
	require 'vendor/autoload.php';
		use Mailgun\Mailgun;

		# Instantiate the client.
		$mgClient = new Mailgun('key-8c8645f9e3e5a013f70d548b01e91d94');
		$domain = "sandbox47f3274b88074e849d6f8495aa3e7447.mailgun.org";

		# Make the call to the client.
		$result = $mgClient->sendMessage("$domain",
				  array('from'    => 'Mailgun Sandbox <postmaster@sandbox47f3274b88074e849d6f8495aa3e7447.mailgun.org>',
				        'to'      => $row[name].'<'.$row[email].'>',
				        'subject' => 'Reset Password',
				        'text'    => 'Hello '.$row[name].', \n \n you just requested reset Password \n\n Please use the below URL to reset the password Or neglect .. note : url is valid for the next hour only... \n \n
				        http://wolves-cafeteria.rhcloud.com/update-pass.php
				        '));
            
            
          
          //SEnd MAIL USING SENDGRID
          
          require("sendgrid-php.php");


/* USER CREDENTIALS
/  Fill in the variables below with your SendGrid
/  username and password.
====================================================*/
$sg_username = "aGSAS3G5ak";
$sg_password = "aabzY9p7w82n8752";

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
    setText( 'Hello '.$row[name].', \n \n you just requested reset Password \n\n Please use the below URL to reset the password Or neglect .. note : url is valid for the next hour only... \n \n
				        http://wolves-cafeteria.rhcloud.com/update-pass.php
				        ' );
    
    $response = $sendgrid->send( $mail );

    if (!$response) {
        throw new Exception("Did not receive response.");
    } else if ($response->message && $response->message == "error") {
        throw new Exception("Received error: ".join(", ", $response->errors));
    } else {
        print_r($response);
    }
} catch ( Exception $e ) {
    var_export($e);
}
          
            
            
         }else{
          echo"DB Error";
         }
   }


  



?>
