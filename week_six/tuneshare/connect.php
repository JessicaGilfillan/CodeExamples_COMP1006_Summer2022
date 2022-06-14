<?php

try {
    //data source name 
    $dsn = 'mysql:host=;dbname=';
    //username
    $username = ''; 
    //password
    $password = '';
    $db = new PDO($dsn, $username, $password);
    //set the errormode to exception 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
   $error_message = $e->getMessage(); 
   echo "<p> Whoops! Our bad! Something happened while trying to connect. It was this -  $error_message </p>"; 
}
?>