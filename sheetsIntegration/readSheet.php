<?php
require_once 'C:\xampp\htdocs\YAZWarehouse\sheetsIntegration\config.php';
  
read_sheet('1BUxtP5uTZnbtAnacq_G8NMH1We2ofe9xw6Knrw3zJLs');
  
function read_sheet($spreadsheetId = '') {
  
    $client = new Google_Client();
  
    $db = new DB();
  
    $arr_token = (array) $db->get_access_token();
    $accessToken = array(
        'access_token' => $arr_token['access_token'],
        'expires_in' => $arr_token['expires_in'],
    );
  
    $client->setAccessToken($accessToken);
  
    $service = new Google_Service_Sheets($client);
  
    try {
        $range = 'J:J';
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();
        var_dump($values);
       
  
        // if (empty($values)) {
        //     print "No data found.\n";
        // } else {
            
        //     foreach ($values as $row) {
               
        //         printf("%s\n", $row[0]);
        //     }
           
        // }
    } catch(Exception $e) {
        if( 401 == $e->getCode() ) {
            $refresh_token = $db->get_refersh_token();
  
            $client = new GuzzleHttp\Client(['base_uri' => 'https://accounts.google.com']);
  
            $response = $client->request('POST', '/o/oauth2/token', [
                'form_params' => [
                    "grant_type" => "refresh_token",
                    "refresh_token" => $refresh_token,
                    "client_id" => GOOGLE_CLIENT_ID,
                    "client_secret" => GOOGLE_CLIENT_SECRET,
                ],
            ]);
  
            $data = (array) json_decode($response->getBody());
            $data['refresh_token'] = $refresh_token;
  
            $db->update_access_token(json_encode($data));
  
            read_sheet($spreadsheetId);
        } else {
            echo $e->getMessage(); //print the error just in case your data is not read.
        }
    }
}