<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();
    
    $userId = $_SESSION['userId'];
    
    include('../dbaccess.php'); 
    include_once '../secrets.php';
    // error_reporting(-1);

    $code = $_GET['code'];
    
//    /oauth/access_token?
//     client_id={app-id}
//    &client_secret={app-secret}
//    &grant_type=client_credentials
        
        
    $url = 'https://graph.facebook.com/oauth/access_token?';
    $url .= 'client_id='.FACEBOOK_APP_ID;
    $url .= '&client_secret='.FACEBOOK_SECRET;
    $url .='&grant_type=client_credentials';
    $url .='&code='.$code.'&redirect_uri='.FACEBOOK_CALLBACK;
//    // // $r = new HttpRequest($url, HttpRequest::METH_GET);
//
    
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);
//
//    // // $result value is json {access_token: ACCESS_TOKEN}
//    $values = json_decode($result, true);
//    print_r($values['access_token']);
//    print_r($result);
    $facebook_access_token;
    foreach (explode('&', $result) as $chunk) {
        $param = explode("=", $chunk);

        if($param[0]=='access_token'){
            $facebook_access_token  = $param[1];
        }
    }
    
    $sql = "UPDATE users set facebook_at = '".$facebook_access_token."'
        WHERE user_id =".$userId;
//    echo $sql;
    mysql_query($sql);
    $_SESSION['fb_at']=$facebook_access_token;
//    $_SESSION['facebook_at']='CAACEdEose0cBAGtxT9hAyPmP3xTFSDC2EOfoKi0EiqFaTBHBxGalc03TXygrH3mMP1edUuYEc0DtdXnYNsqmkYnLPZAWjcfNf1el7lREHQNH0HOm6qYFbr41CGuzZBecH4PrZBMqc77UPai8ty4oRAc8ZAJAZBtbe14frlyKJGAZDZD';
//    $_SESSION['facebook_at']='CAACEdEose0cBAEcWvAF7r4dtyF5GZAxi4gzuk0zcJUbBKwkFpdDPfr3fm1zB3W0bePpXHX39UXf2SMXURWB0ZBt3gxsWn8ni8z7cXlJMR1rAx44SVHjzmk3I0lZBtgdNbX8bCG4Dqa6DIcK8oIK6tIWNyzWZBz2ni6sKjxBR9AZDZD';
//    CAAHwHVThdI4BAEdZAkanixYMR8OWLgGZB80ooZBaiogyAJqB4ZAN8aDRD0Q7ZBHCGBouuvvJImfUi09uXzibXXOUked9lXnRfffXVoK7zbTFurnpypd4YojLoM8laUQ2w2OoN1borPV7ZAI00Hy90RmFlYItbWBdi4Rabz8QDzEAZDZD
    $_SESSION['fb_at']='CAACEdEose0cBAAElkwtSNwMCxEkxCkuDz8EQKfVanRHgdZBMBrnsLGXaXQWhBBfLl3r1XwGWc98BK2YZAXOUjjMZCuRUZAcafiegRWF12kzkhTx3gnkL50FSiYc6ByaFu4iM0TiOgfHSb5ZAFiljF7tabIDwuJamskDLlYLIK9wZDZD';
    
    include('get_posts.php');
    
    // next is foursquare
//    include('../foursquare/auth.php'); 
//    $facebook_access_token = $_GET['access_token'];
//    echo $foursquare_access_token;
//    echo "sa ".$userId;
//    $sql = "UPDATE users set foursquare_at = '".$foursquare_access_token."'
//        WHERE user_id =".$userId;
////    echo $sql;
//    mysql_query($sql);
//    $_SESSION['foursquare_at']=$foursquare_access_token ;
////    include('get_venues.php');
//    include('get_badges.php');
?>
