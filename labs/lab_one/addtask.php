<?php

$description = 
$type = 
$due_date = 


//connect to the db 

//set up the SQL statement & store in a variable 
$sql = ""; 

//prepare the statement
$statement = $db->prepare($sql);

//bindparams 

//execute the statement 

//close DB 
$statement->closeCursor();

//send user to the view tasks page
header("Location: viewtasks.php");
?>