<?php

session_start();

$localhost = "localhost";
$user = "root";
$password = "";
$nameBD = "tblTasks";

$table = "tasks";

try {
    $conection = new PDO('mysql:host='.$localhost.';dbname='.$nameBD,$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch(Exception $e){
    echo "Error: ".$e->getMessage();
}

/*
if(isset($conection)){
    echo "Conexion establecida";
}
*/
?>