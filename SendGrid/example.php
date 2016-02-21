<?php

//
// SendGrid PHP Library Example
//
// This example shows how to send email through SendGrid
// using the SendGrid PHP Library.  For more information
// on the SendGrid PHP Library, visit:
//
//     https://github.com/sendgrid/sendgrid-php
//

require("sendgrid-php.php");


/* USER CREDENTIALS
/  Fill in the variables below with your SendGrid
/  username and password.
====================================================*/


/
====================================================*/
$sendgrid = new SendGrid( $sg_username, $sg_password );
$mail = new SendGrid\Email();




/* SEND MAIL
/  Replace the the address(es) in the setTo/setTos
/  function with the address(es) you're sending to.
====================================================*/
try {
    $mail->
    //setFrom( "eng.mohamed16@yahoo.com" )->
    setFrom( "emohamesendgrid.com" )->
    addTo( "en.com" )->
    setSubject( "hello mohamed" )->
    setText( "Hello,\n\n test" );
    
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


?>
