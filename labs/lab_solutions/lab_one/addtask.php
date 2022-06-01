<?php

$description = filter_input(INPUT_POST, 'description'); 
$type = filter_input(INPUT_POST, 'type'); 
$due_date = filter_input(INPUT_POST, 'date'); 


//connect to the db 
require ('connect.php'); 

//set up the SQL statement & store in a variable 
$sql = "INSERT INTO tasks (description, type, date) VALUES (:description, :type, :date);"; 


//prepare the statement
$statement = $db->prepare($sql);

//bindparams 
$statement->bindParam(':description', $description);
$statement->bindParam(':type', $type);
$statement->bindParam(':date', $due_date);

//execute the statement 
$statement->execute(); 

//close DB 
$statement->closeCursor();

//send user to view task page 
header("Location: viewtasks.php");
?>