<?php
// Foursquare login stage 1, build url and redirect
  require_once('../secrets.php'); //defines CLIENT_ID

// build $url
  $url = 'https://github.com/login/oauth/authorize';
  $url .= '?client_id='.GITHUB_CLIENT_D;
  $url .= '&response_type=code';
  $url .= '&redirect_uri='.GITHUB_CALLBACK; // change to your 4sq callback

// redirect
  header( 'Location: '.$url ) ;

?>

