<?php

$firstname = filter_input(INPUT_POST, 'firstname'); 
$lastname = filter_input(INPUT_POST, 'lastname');

require_once('connect.php'); 

$sql = "INSERT into students1 (firstname, lastname) VALUES (:firstname, :lastname);";

$statement = $conn->prepare($sql); 

$statement->bindParam(':firstname', $firstname); 
$statement->bindParam(':lastname', $lastname); 

$statement->execute(); 

$statement->closeCursor(); 

header('Location: view.php'); 

?>