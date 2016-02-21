<?php
   
   error_reporting(0);
ini_set('display_errors', 1);

# Include the Autoloader (see "Libraries" for install instructions)
require 'MailGun/vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-8c8645f9e3e5a013f70d548b01e91d94');
$domain = "sandbox47f3274b88074e849d6f8495aa3e7447.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
                  array('from'    => 'Mailgun Sandbox <postmaster@sandbox47f3274b88074e849d6f8495aa3e7447.mailgun.org>',
                        'to'      => 'mohamed khaled <eng.mohamed16@yahoo.com>',
                        'subject' => 'Hello mohamed khaled',
                        'text'    => 'Congratulations mohamed khaled, you just sent an email with Mailgun!  You are truly awesome!  You can see a record of this email in your logs: https://mailgun.com/cp/log .  You can send up to 300 emails/day from this sandbox server.  Next, you should add your own domain so you can send 10,000 emails/month for free.'));
                        
                        echo "Hello";
    ?>
