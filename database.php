<?php
$server = "localhost";
$username = "eaedgington";
$password = "XzWlKrxfuq3b7upi";
$dbname = "eaedgington_artgallery";

try {
  $db = new PDO(
    "mysql:host=$server;dbname=$dbname",
    $username,
    $password
  );

}
catch( PDOException $e ){
  echo $e->getMessage();
  die();
}

 ?>
