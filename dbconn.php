<?php

/*
	2013-9-24 by chrischan.
    use the POO:mysql to connect to DB.
 */


$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = 'change#Me1347';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

try{
        $dbh = new PDO($dsn, $username, $password, $options);
        //echo "connected.";
    }catch(PDOException $exception){
        echo "Connection error: " . $exception->getMessage(); 
}


?>
