<?php
//http://api.stackoverflow.com/1.1/users/550618/reputation
//http://api.stackoverflow.com/1.1/users/550618/badges 
//http://api.stackoverflow.com/1.1/users/1947335/badges

  $url = 'http://api.stackoverflow.com/1.1/users/1947335';
////    $url = 'https://api.github.com/users/'.$userGHId.'/repos';
////    $url = 'https://api.github.com/user/repos?access_token=577706b24c3264a6acfaff3795fab579060bd0c7';
////    
    $curl = curl_init();
//    curl_setopt($ch,);
// Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request',
        CURLOPT_ENCODING => "gzip"
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);
//    // // $result value is json {access_token: ACCESS_TOKEN}
//    
//    $arr = json_decode($resp);
    header('Content-type: application/json');
    echo($resp);
?>
