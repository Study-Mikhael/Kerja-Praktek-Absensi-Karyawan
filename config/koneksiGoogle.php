<?php
require_once 'google-api-php-client/vendor/autoload.php';
$gClient = new Google_Client();
$gClient->setApplicationName('Login App');
$gClient->setClientId("874449713402-tonicadlf6tqleq6bc3bri8krfab81rb.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/absen_mahasiswa/index.php');
$gClient->addScope('openid');
$gClient->addScope('https://www.googleapis.com/auth/userinfo.email');
$gClient->addScope('https://www.googleapis.com/auth/userinfo.profile');
$gClient->addScope('https://mail.google.com');

$google_oauthV2 = new \Google_Service_Oauth2($gClient);