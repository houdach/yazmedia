<?php
require_once 'C:\xampp\htdocs\YAZWarehouse\sheetsIntegration\config.php';
  
try {
    $adapter->authenticate();
    $token = $adapter->getAccessToken();
    $db = new DB();
    $db->update_access_token(json_encode($token));
    echo "Access token inserted successfully.";
}
catch( Exception $e ){
    echo $e->getMessage() ;
}