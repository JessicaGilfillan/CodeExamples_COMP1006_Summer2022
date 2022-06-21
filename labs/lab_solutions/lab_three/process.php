<?php
//initialize user id in case we are not editing and we don't need it
$user_id = null;
$user_id = filter_input(INPUT_POST, 'user_id'); 
$firstname = filter_input(INPUT_POST, 'firstname'); 
$lastname = filter_input(INPUT_POST, 'lastname');

require_once('connect.php'); 

echo $user_id; 

//check if there is a user id, if so, it means we need to run an update query 
if(!empty($user_id)) {
    $sql = "UPDATE students1 SET firstname = :firstname, lastname = :lastname WHERE user_id = :user_id"; 
}
//otherwise we are adding a new record 
else {
    $sql = "INSERT into students1 (firstname, lastname) VALUES (:firstname, :lastname);";
}

$statement = $conn->prepare($sql); 

$statement->bindParam(':firstname', $firstname); 
$statement->bindParam(':lastname', $lastname); 
//we may need to bind if we are editing 
if(!empty($user_id)) { 
    $statement->bindParam(':user_id', $user_id);
}

$statement->execute(); 

$statement->closeCursor(); 

header('Location: view.php'); 

?>