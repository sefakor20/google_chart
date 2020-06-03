<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'world';

//set DSN
$dsn = 'mysql:host='. $host . '; dbname='. $dbname;


//create connection to the database
try {

  $connection = new PDO($dsn, $user, $password);

  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
  die($e->getMessage());
}

error_reporting(0);