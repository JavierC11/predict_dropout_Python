<?php

try{
  define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', 'Q:g1=iVhqqOn');

define('DB_NAME', 'proyecto_prediccion');

 

/* Attempt to connect to MySQL database */

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
}
catch(Exception $e)
{
  echo $e;

}

/* Database credentials. Assuming you are running MySQL

server with default setting (user 'root' with no password) */


?>