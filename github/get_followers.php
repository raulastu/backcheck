<?php
    include('../dbaccess.php');
//print_r( $gr->getRepoDetails('mii') );
    $userGHId= 'raulooo';
    $userId=1;
//    $url = 'https://api.github.com/users/'.$userGHId.'/repos';
//    $url = 'https://api.github.com/users/'.$userGHId.'/repos';
    $url = 'https://api.github.com/user/followers?access_token=577706b24c3264a6acfaff3795fab579060bd0c7';
//    
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
    $langs = array();
    foreach($arr as $ob){
        $langs[$ob->language]++;
//        print_r($ob->language);
    }
    foreach (array_keys($langs)as $ob){
//        print_r($ob);
        if($ob=='')continue;
        $sql = 'INSERT INTO github_languages (user_id, lang_name, count) VALUES ('.$userId.',\''.$ob.'\','.$langs[$ob].')';
        $reg = mysql_query($sql);
//        echo $sql;
    }
    print_r($langs);
?>
