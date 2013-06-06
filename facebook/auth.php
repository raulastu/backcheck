<?php
// Foursquare login stage 1, build url and redirect
  require_once('../secrets.php'); //defines CLIENT_ID

// build $url
  
  https://www.facebook.com/dialog/oauth/?
//    client_id=YOUR_APP_ID
//    &redirect_uri=YOUR_REDIRECT_URL
//    &state=YOUR_STATE_VALUE
//    &scope=COMMA_SEPARATED_LIST_OF_PERMISSION_NAMES
      
  $url = 'https://www.facebook.com/dialog/oauth/';
  $url .= '?client_id='.FACEBOOK_APP_ID;
  $url .= '&state=23234';
  $url .= '&redirect_uri='.FACEBOOK_CALLBACK; // change to your 4sq callback
  $url .= '&scope=email,read_friendlists,user_status,read_stream';
  $url .= '&response_type=code';
  

// redirect
  header( 'Location: '.$url ) ;

?>

