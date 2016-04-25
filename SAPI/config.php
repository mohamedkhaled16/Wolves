<?php

session_start();
require_once 'facebooklib/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
    'app_id' => '841430142669991',
    'app_secret' => 'f138b5f00e6df5e54181c26e9782a939',
    'default_graph_version' => 'v2.5',
        ]);

?>


