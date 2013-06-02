<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include('../dbaccess.php');
//print_r( $gr->getRepoDetails('mii') );
//    $userGHId= 'raulooo';
    $userId = $_SESSION['userId'];
//    $userId=1;
    $url = 'https://graph.facebook.com/me/statuses?access_token='.$_SESSION['fb_at'];
//    $url = 'https://api.github.com/users/'.$userGHId.'/repos';
//    $url = 'https://api.github.com/user/repos?access_token=577706b24c3264a6acfaff3795fab579060bd0c7';
//  
//    echo $url;
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
    print_r($arr);
//    print_r();
    $os = array("gay", "faggot", "anus", "ass", "damn");
    $racist = array("ginger");
    $anger = array("fuck", "damn", "frustrating");
//     = array("gay", "faggot", "anus", "ass", "damn",);
    $badwords=0;
    $racistwords=0;
    $missspeling=12;
    $anger_count=3;
    $ix=0;
    foreach($arr->data as $messages){
        $ix++;
        foreach ($os as $bad){
                if (strpos($messages->message, $bad) !== FALSE)
                    $badwords++;
        }
        foreach ($racist  as $bad){
                if (strpos($messages->message, $bad) !== FALSE)
                    $racist++;
        }
        foreach ($os as $bad){
                if (strpos($messages->message, $bad) !== FALSE)
                    $badwords++;
        }
        foreach ($anger as $bad){
                if (strpos($messages->message, $bad) !== FALSE)
                    $anger_count++;
        }
    }
     $sql = 'INSERT INTO facebook_score(user_id, swear_count, racism_count, misspelling_count, anger_count) VALUES ('.$userId.','.$badwords.','.$racistwords.','.$missspeling.','.$anger_count.')';
     mysql_query($sql);
?>
