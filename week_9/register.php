<?php
/* We need to validate the user info, then store the information in our database table. Really important to make sure we are storing the user password in a secure manner - hash the password using password_hash( ) */

//validate & store form info 

$input_first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$input_last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$input_username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS); 
$input_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL); 
$input_password = filter_input(INPUT_POST, 'password'); 
$input_password_confirm = filter_input(INPUT_POST, 'confirm_password');


/* validation 
1.) all form fields are completed 
2.) email is a valid email address
3.) Password and password confirm match 
4.) Password is at least 6 characters long 
*/

if (empty($input_first_name) || empty($input_last_name) || empty($input_email) ||   empty($input_username)  ||  empty($input_password) ||  empty($input_password_confirm)) {
    echo "<p> You must fill out all the info please! </p>"; 
}
elseif ($input_email === false) {
    echo "<p> Please provide a valid email address </p>"; 
}
elseif ($input_password != $input_password_confirm) {
    echo "<p> Passwords don't match! </p>"; 
}
elseif (strlen($input_password) < 6) {
    echo "<p> Passwords must be at least 6 characters! </p>"; 
}
else {
    try{
    //hash the password 
    
    //connect to the db 
    require_once 'connect.php'; 
    //set up the query 
    $query = "INSERT INTO coolcats (first_name, last_name, username, email, password) VALUES (:first_name, :last_name, :username, :email, :password)";
    //prepare 
    $stmt =  $db->prepare($query); 
    //bindParam
    $stmt->bindParam(':first_name', $input_first_name); 
    $stmt->bindParam(':last_name', $input_last_name); 
    $stmt->bindParam(':username', $input_username); 
    $stmt->bindParam(':email', $input_email); 
    $stmt->bindParam(':password', $hashedpassword); 
    //execute 
    $stmt->execute(); 
    } 
    catch(Exception $e) {
        $errormessage = $e->getMessage();
        echo "<p> Opps! Something went wrong? </p>"; 
        echo $errormessage; 
    }
    finally {
        $stmt->closeCursor(); 
    }
}
?>