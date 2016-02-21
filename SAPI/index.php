<?php
require_once 'config.php';

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes'];
// optional
$loginUrl = $helper->getLoginUrl('http://wolves-cafeteria.rhcloud.com/SAPI/callback.php', $permissions);
echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';




/*


  var_dump($fb);
  $fb->get('/me');
  $helper = $fb->getRedirectLoginHelper();
  echo $helper; */
//echo $fb->get('/me');
//$helper = $fb->getRedirectLoginHelper();
//echo $helper; 
/* echo $helper;
 */
//var_dump($ttt);
?>


