<?php

$dsn = 'mysql:host=__________;dbname=__________';
$user = ''; 
$password = ''; 

try {
$db = new PDO($dsn, $user, $password); 
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
    echo "<p>Unable to establish a connection" . $e->getMessage();

}
