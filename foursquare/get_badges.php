<?php
    include_once '../utils/globals.php';
    include('../dbaccess.php');
//print_r( $gr->getRepoDetails('mii') );
//    $userGHId= 'raulooo';
    $userId = $_SESSION['userId'];
//    $userId=1;
    $url = 'https://api.foursquare.com/v2/users/self/badges?oauth_token='.$_SESSION['foursquare_at'];
//    $url = 'https://api.github.com/users/'.$userGHId.'/repos';
//    $url = 'https://api.github.com/user/repos?access_token=577706b24c3264a6acfaff3795fab579060bd0c7';
//    
    $curl = curl_init();
// Set some options - we are passing in a useragent too here
//    echo $url;
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
//    print_r($arr->response->badges);
    foreach($arr->response->badges as $badge){
//        foreach ($venues as $idx){
//            print_r($idx->);
//            print_r($badge);
        $badgeName = $badge->name;
        $badgeImg = $badge->image->prefix;
        $badgeImgSize = $badge->image->sizes[0];
        $name = $badge->image->name;
        $imgURL = $badgeImg.$badgeImgSize.$name;
//            echo $imgURL;
        $sql = 'INSERT INTO foursquare_badges (user_id, badge_name, img_url) VALUES ('.$userId.',\''.$badgeName.'\',\''.$imgURL.'\')';
//        echo $sql ;
        mysql_query($sql);
//            foursquare_badges
//            print_r($venues->beenHere);
//        }
    }
    
//    $langs = array();
//    foreach($arr as $ob){
//        $langs[$ob->language]++;
////        print_r($ob->language);
//    }
//    foreach (array_keys($langs)as $ob){
////        print_r($ob);
//        if($ob=='')continue;
//        $sql = 'INSERT INTO github_languages (user_id, lang_name, count) VALUES ('.$userId.',\''.$ob.'\','.$langs[$ob].')';
//        $reg = mysql_query($sql);
////        echo $sql;
//    }
?>
