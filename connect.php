<?php
/**
*connecting file use object from class PDO to connect to server and database names, username and password   new PDO($dsn, $user, $pass);
*@param string  $dsn = database and server name
*@param varchar $user =  username
*@param varchar $pass = password
*object    $con  
*/
$dsn = 'mysql:host=localhost;dbname=shop';
$user = 'root';
$pass = '';
$option = array (
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',//initial command to set the increption to utf-8
);

try{
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// setting the attribute error mode to (ERRMODE_EXCEPTION)
    echo '';
}

catch(PDOException $e){// in case of connecting failed catch the error and get it's message
    echo'FAILED TO CONNECT <br>' . $e->getMessage();
    die();
}
