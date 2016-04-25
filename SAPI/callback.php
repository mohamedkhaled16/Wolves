<?php
error_reporting(0);
ini_set('display_errors', 1);
//echo "hwaaa";
require_once 'config.php';
echo $_SESSION['facebook_token']=$GET['code'];
$posts=array("first post","second post","third post","forth post");

// $linkData = ['message' => $posts[$i]];

$helper = $fb->getRedirectLoginHelper();

$accessToken = $helper->getAccessToken();


for($i=0;$i<count($posts);$i++) {
    $response = $fb->post('/me/feed',['message' => date('h:i:s')], $accessToken);
    sleep(30);
}
/*echo "helaaa";
$helper = $fb->getRedirectLoginHelper();
try {
    $accessToken = $helper->getAccessToken();
    echo $accessToken;
    echo "helaaa";

    
} catch
 (Facebook\Exceptions\FacebookResponseException $e) {
// When Graph returns an error
    echo'Graph returned an error: ' . $e->getMessage();
    exit;
}*/
?>


