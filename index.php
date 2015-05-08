<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
        set_time_limit(0);
        ini_alter('default_socket_timeout', 300);
        session_start();
        define('clientID', value);
        define('client_Secret', value);
        define('redirectURI', value);
        define('ImageDirectory', 'pics/');
        
        function connectToInstagram($url){
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => 2,
        ));
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }
        function getUserID($userName){
            $url = 'http://api.instagram.com/v1/users/search?q='.$userName.'&client_id='.clientID;
            $instagramInfo=  connectToInstagram($url);
            $results = json_decode($instagramInfo,true);
            echo $results ['data']['0']['id'];
        }
        
        if (isset($_GET['code'])){
            $code = ($_GET['code']);
            $url = 'https://api.instagram.com/oauth/access_token';
            $access_token_settings = array('client_id' => clientID,
                                            'client_secret'=> client_Secret,
                                            'grant_type'=> 'authorization_code',
                                            'redirect_uri'=> redirectURI,
                                            'code'=>$code
                                            );
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$access_token_settings);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $result = curl_exec($curl);
        curl_close($curl);
        $results = json_decode($result,true);
        echo $results['user']['username'];
        }
        else {
            
        }
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" hrer="css/style.css">
        <title>SelfiesForDays</title>
    </head>
    <body>
        <a href="https:api.instagram/ouath/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">LOGIN</a>
    </body>
</html>
