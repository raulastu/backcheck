<?php
session_start();
$_SESSION['userId']='1';
//header( 'Location: http://localhost:8888/foursquare/auth.php' ) ;
header( 'Location: http://localhost:8888/facebook/auth.php' ) ;
?>