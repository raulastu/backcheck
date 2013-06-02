<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();
    $userId = $_SESSION['userId'];
    
    include('../dbaccess.php'); 
    include_once '../secrets.php';
    // error_reporting(-1);

    $code = $_GET['code'];
    $url = 'https://foursquare.com/oauth2/access_token?';
    $url .= 'client_id=04FMZNS40A03EYT4WHBPGFIBZTWPVPKHEBMYBGGNBZ3DLELN';
    $url .= '&client_secret=RK21AJWPI2F21EZVTBDYSX0ON0PFPFL2X0VETBFNDG3FFIME';
    $url .='&grant_type=authorization_code';
    $url .='&code='.$code.'&redirect_uri='.FOURSQUARE_CALLBACK;
    // // $r = new HttpRequest($url, HttpRequest::METH_GET);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);

    // // $result value is json {access_token: ACCESS_TOKEN}
    $values = json_decode($result, true);
//    print_r($values['access_token']);
    $foursquare_access_token = $values['access_token'];
//    echo "sa ".$userId;
    $sql = "UPDATE users set foursquare_at = '".$foursquare_access_token."'
        WHERE user_id =".$userId;
//    echo $sql;
    mysql_query($sql);
    $_SESSION['foursquare_at']=$foursquare_access_token ;
//    include('get_venues.php');
    include('get_badges.php');
    include_once '../github/auth.php';
?>
