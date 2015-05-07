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
        
        if isset($_GET['code'])){
            $code = ($_GET['code']);
            $url = 'https://api.instagram.com/oauth/access_token';
            $access_token_settings = array('client_id' => clientID,
                                            'client_secret'=> client_Secret,
                                            'grant_type'=> 'authorization_code',
                                            'redirect_uri'=> redirectURI,
                                            'code'=>$code
                                            );
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
