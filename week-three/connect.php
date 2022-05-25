<?php
try {
    $dsn = 'mysql:host=172.31.22.43;dbname=Jessica001';
    $username = 'Jessica001'; 
    $password = 'KXeorM36ld';
    $db = new PDO($dsn, $username, $password);
}
catch(PDOException $e) {
   $error_message = $e->getMessage(); 
   echo "<p> Whoops! Our bad! Something happened while trying to connect. It was this -  $error_message </p>"; 
}
?>