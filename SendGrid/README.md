# README FILE

## SUMMARY

This folder contains a working example of sending email through SendGrid using the SendGrid PHP Library.

## Requirements

This example requires the "example.php" file be present, along with the "sendgrid-php" folder and its contents.  Before running the "example.php" file, you'll need to fill in some information before hand.

- Fill in the `$sg_username` variable with your SendGrid username.
- Fill in the `$sg_password` variable with your SendGrid password.
- Add your from address to the `setFrom()` function.
- Add your recipient(s) to the `setTo()`/`setTos()` function.