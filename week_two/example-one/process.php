<?php
// grab the first and last name entered by the user using $_POST
/*$first_name = $_POST['firstname']; 
$last_name = $_POST['lastname'];*/

$first_name = filter_input(INPUT_POST, 'firstname');
$last_name = filter_input(INPUT_POST, 'lastname');  
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 


//then echo in the browser 
echo "<p> Hey there $first_name $last_name $email </p>";


?>