<?php 
    include_once '../utils/globals.php';
    include_once '../dbaccess.php';
//string(71) "access_token=577706b24c3264a6acfaff3795fab579060bd0c7&token_type=bearer"
    session_start();
    $userId = $_SESSION['userId'];
//    include('dbaccess.php'); 
    require_once('../secrets.php'); //defines CLIENT_ID
    

    $code = $_GET['code'];
//    print_r($code);
//    $url = 'https://github.com/login/oauth/access_token?'.
//    'https://api.github.com/user/repos?access_token=577706b24c3264a6acfaff3795fab579060bd0c7
//    $url .= 'client_id='.GITHUB_CLIENT_D;
//    $url .= '&client_secret='.GITHUB_SECRET;
//    $url .= '&code='.$code;
//    $url .= '&redirect_uri='.GITHUB_CALLBACK;
    // // $r = new HttpRequest($url, HttpRequest::METH_GET);
//    echo $url;
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_URL, $url);
//    $result = curl_exec($ch);
//    curl_close($ch);
//    $res = file_get_contents("https://api.github.com/repos/qeremy/mii");
    
    $url = 'https://github.com/login/oauth/access_token';
    $data = array('client_id' => GITHUB_CLIENT_D,
        'client_secret' => GITHUB_SECRET,
        'code'=>$code,
        'redirect_uri'=>GITHUB_CALLBACK);


    $options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
//    echo $result;
    $access_token = '';
    foreach (explode('&', $result) as $chunk) {
        $param = explode("=", $chunk);

        if($param[0]=='access_token'){
            $access_token = $param[1];
        }
    }
    
    $sql = "UPDATE users set github_at = '".$access_token ."'
        WHERE user_id =".$userId;
//    echo $sql;
    mysql_query($sql);
//    exec($sql);
    $_SESSION['github_at']=$access_token;
    
    include('get_gh_user.php');
    include('get_gh_repos.php');
    
    header( 'Location: ../success.php') ;
//    $sql = "INSERT INTO users (user_full_name, reg_date) VALUES ("
//    print_r($json);
//    $res = json_decode($res);
    // // $result value is json {access_token: ACCESS_TOKEN}
//    $values = json_decode($result);
//    print_r($res);
    //   $token = $values['access_token'];
    //    $reg = mysql_query("INSERT INTO users (username,access_token) VALUES ('ola','".$token."')"); 
    // if($reg) { 
    //                 echo "Registro Exitoso."; 
    //             }else { 
    //                 echo "Ha ocurrido un error y no se registraron los datos."; 
    //             }

    // $r->setOptions(array('lastmodified' => filemtime('local.rss')));
    // $r->addQueryData(array('category' => 3));
    // try {
    //     $r->send();
    //     if ($r->getResponseCode() == 200) {
    //         print_r($r);
    //     }
    // } catch (HttpException $ex) {
    //     echo $ex;
    // }
?>
