<?php
    include('../dbaccess.php');
//print_r( $gr->getRepoDetails('mii') );
//    session_start();
    $userId = $_SESSION['userId'];
    
//    $userGHId= 'raulooo';
//    $userId=1;
//    $url = 'https://api.github.com/users/mikeal';
//    $url = 'https://api.github.com/users/'.$userGHId.'/repos';
    $url = 'https://api.github.com/user?access_token='.$_SESSION['github_at'];
//    echo $url
    $curl = curl_init();
// Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);
    // // $result value is json {access_token: ACCESS_TOKEN}
    
    $arr = json_decode($resp);
    $followers = $arr->followers;
    $repos = $arr->public_repos;
    $sql = 'INSERT INTO github_report (user_id, n_repos, n_followers) VALUES ('.$userId.',\''.$repos.'\','.$followers.')';
    $reg = mysql_query($sql);
//    print_r($langs);
?>
