<?php
require_once 'templates/header.html';

    require_once 'google/vendor/autoload.php';

    $clientID = '715148288759-8am528hp7e5r23n4n99dugvdo9vbem43.apps.googleusercontent.com';
    $clientSecret = 'kQGWYAfhT-jMsxYg_OsPGYLL';
    $redirectUri = 'http://localhost:8001/index.php';

    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");

    // authenticate code from Google OAuth Flow
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        require_once 'templates/test.html';
    } else require_once 'templates/auth.html';

require_once 'templates/footer.html';