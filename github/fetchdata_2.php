<?php

    $userGHId= 'raulooo';
//    $url = 'https://api.github.com/users/raulooo/repos';
    $url = 'https://api.github.com/user/repos?access_token=577706b24c3264a6acfaff3795fab579060bd0c7';
    
//    $res = file_get_contents($url);
//    $res = json_decode($res);
//    print_r($res);
    
    $options = array(
        'http' => array(
                'method'  => 'GET'
            ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
//
    var_dump($result);
?>
