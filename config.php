<?php
$serverName ="localhost";
$userName = "root";
$password = "1234";
$dbName = "todo";
try{
  $connection = new PDO("mysql:host=$serverName;dbname=$dbName",$userName,$password);
  $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $exception){
  echo "Connected failed".$exception->getMessage();
}
?>
