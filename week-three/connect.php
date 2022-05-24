<?php
try {
    $dsn = '';
    $username = ''; 
    $password = '';
    $db = new PDO($dsn, $username, $password);
}
catch(PDOException $e) {
   $error_message = $e->getMessage(); 
   echo "<p> Whoops! Our bad! Something happened while trying to connect. It was this -  $error_message </p>"; 
}
?>