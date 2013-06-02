<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    $host_db = "localhost";
    $usuario_db = "root";
    $clave_db = "root";
    $nombre_db = "raulooo_backcheck";
  
    $db_link = mysql_connect($host_db, $usuario_db, $clave_db) or die ('Ha fallado la conexión con el servidor: '.mysql_error());; 
    mysql_select_db($nombre_db) or die ('Error al seleccionar la Base de Datos: '.mysql_error());

//    $con=mysqli_connect($host_db, $usuario_db,$clave_db, $nombre_db);
    
//    function exec($query){
//        $host_db = "localhost";
//        $usuario_db = "root";
//        $clave_db = "root";
//        $nombre_db = "raulooo_backcheck";
//        $con=mysqli_connect($host_db, $usuario_db,$clave_db, $nombre_db);
//// Check connection
//        if (mysqli_connect_errno())
//          {
//          echo "Failed to connect to MySQL: " . mysqli_connect_error();
//          }
//
//        mysqli_query($con,$query);
//
//        mysqli_close($con);
//    }

?>
