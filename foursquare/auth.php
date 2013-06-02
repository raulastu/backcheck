<?php
// Foursquare login stage 1, build url and redirect
  require_once('../secrets.php'); //defines CLIENT_ID

// build $url
  $url = 'https://foursquare.com/oauth2/authenticate';
  $url .= '?client_id='.FOURSQUARE_CLIENT_ID;
  $url .= '&response_type=code';
  $url .= '&redirect_uri='.FOURSQUARE_CALLBACK; // change to your 4sq callback

// redirect
  header( 'Location: '.$url ) ;

?>

