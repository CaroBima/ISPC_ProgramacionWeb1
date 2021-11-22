<?php


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'beerfriendsstocksystem');

//conccion a la base de datos
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// verifico si se pudo hacer la conexion, si no da error
if($link === false){
    die("ERROR: No se pudo realizar la conexión. " . mysqli_connect_error());
}
?>