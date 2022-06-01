<?php
try {
    $dsn = 'mysql:host=localhost;dbname=COMP1006_Summer2022';
    $username = 'root'; 
    $password = 'root';
    $db = new PDO($dsn, $username, $password);
}
catch(PDOException $e) {
   $error_message = $e->getMessage(); 
   echo "<p> Whoops! Our bad! Something happened while trying to connect. It was this -  $error_message </p>"; 
}
?>