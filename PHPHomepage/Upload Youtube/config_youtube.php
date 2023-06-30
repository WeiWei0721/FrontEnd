<?php
    // OAUTH Configuration
    $oauthClientID = '551436050358-smrn71g1agvgqsi358cj4st0vc2gf5ur.apps.googleusercontent.com';
    $oauthClientSecret = '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';
    $baseUri = 'http://localhost/youtube_demo/';
    $redirectUri = 'http://localhost/youtube_demo/youtube_upload.php';
    
    define('OAUTH_CLIENT_ID',$oauthClientID);
    define('OAUTH_CLIENT_SECRET',$oauthClientSecret);
    define('REDIRECT_URI',$redirectUri);
    define('BASE_URI',$baseUri);
    
    // Include google client libraries
    require_once 'src/autoload.php'; 
    require_once 'src/Client.php';
    require_once 'src/Service/YouTube.php';
    session_start();
    
    $client = new Google_Client();
    $client->setClientId(OAUTH_CLIENT_ID);
    $client->setClientSecret(OAUTH_CLIENT_SECRET);
    $client->setScopes('https://www.googleapis.com/auth/youtube');
    $client->setRedirectUri(REDIRECT_URI);
    
    // Define an object that will be used to make all API requests.
    $youtube = new Google_Service_YouTube($client);
    
?>