<?php

require_once 'C:\xampp\htdocs\YAZWarehouse\vendor\autoload.php';
require_once 'C:\xampp\htdocs\YAZWarehouse\dataBase\class-db.php';

  
define('GOOGLE_CLIENT_ID', '568752862794-u132ap85o0beuu7o71lc1ibka034qil5.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
  
$config = [
    'callback' => 'http://localhost/YAZWarehouse/sheetsIntegration/callback.php',
    'keys'     => [
                    'id' => GOOGLE_CLIENT_ID,
                    'secret' => GOOGLE_CLIENT_SECRET
                ],
    'scope'    => 'https://www.googleapis.com/auth/spreadsheets',
    'authorize_url_parameters' => [
            'approval_prompt' => 'force', // to pass only when you need to acquire a new refresh token.
            'access_type' => 'offline'
    ]
];
  
$adapter = new Hybridauth\Provider\Google( $config );