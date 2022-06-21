<?php

try {
    //data source name 
    $dsn = 'mysql:host=localhost;dbname=COMP1006_Summer2022';
    //username
    $username = 'root'; 
    //password
    $password = 'root';
    $conn = new PDO($dsn, $username, $password);
    //set the errormode to exception 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
   $error_message = $e->getMessage(); 
   echo "<p> Whoops! Our bad! Something happened while trying to connect. It was this -  $error_message </p>"; 
}
?>