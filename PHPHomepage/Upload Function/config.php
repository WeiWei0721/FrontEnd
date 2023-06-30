<?php 
 
// Database configuration    
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', 'mysql'); 
define('DB_NAME', 'allvideos'); 
 
// Google API configuration 
define('OAUTH_CLIENT_ID', '551436050358-smrn71g1agvgqsi358cj4st0vc2gf5ur.apps.googleusercontent.com'); 
define('OAUTH_CLIENT_SECRET', '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'); 
// define('REDIRECT_URL', 'http://localhost/Project/youtube_video_sync.php'); 
define('REDIRECT_URL', 'http://localhost/TIC4902/PHPHomepage/Upload%20Function/youtube_video_sync.php'); 
 
 
// Start session 
if(!session_id()) session_start(); 
 
// Include google client libraries 
// require_once 'vendor/autoload.php';  
// require_once 'vendor/google/apiclient/src/Client.php'; 
// require_once 'vendor/google/apiclient-services/src/YouTube/Resource/Youtube.php'; 
require_once './google-api-php-client--PHP7.4/vendor/autoload.php';  
require_once './google-api-php-client--PHP7.4/vendor/google/apiclient-services/src/AuthorizedBuyersMarketplace/Client.php'; 
require_once './google-api-php-client--PHP7.4/vendor/google/apiclient-services/src/YouTube/Resource/Youtube.php'; 
 
// Initialize Google Client class 
$client = new Google_Client(); 
$client->setClientId(OAUTH_CLIENT_ID); 
$client->setClientSecret(OAUTH_CLIENT_SECRET); 
$client->setScopes('https://www.googleapis.com/auth/youtube'); 
$client->setRedirectUri(REDIRECT_URL); 
 
// Define an object that will be used to make all API requests 
$youtube = new Google_Service_YouTube($client); 
 
?>