<?php

require_once 'vendor/autoload.php';

$google_client = new Google_Client();

$google_client->setClientId('86385886443-j5183rr9dc5nh9inmvi0iasdpc84ccd2.apps.googleusercontent.com');

$google_client->setClientSecret('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');

$google_client->setRedirectUri('http://localhost/Bible-Verse-Reader/auth.php');

$google_client->addScope('email');

$google_client->addScope('profile');

session_start();