<?php
//validate our user information, checking to see whether information has been entered and whether it is in the proper format

//creating an empty array to store error messages 
$errors = array();
//check to see whether data has been entered and whether it is the correct format, provide a heplful error message if not and set the flag variable to true 

if (empty($input_firstname) || empty($input_lastname)) {
  $error_msg_1 = "Please enter first and last name";
  array_push($errors, $error_msg_1);
}

if (empty($input_location)) {
  $error_msg_2 = "Where you at?";
  array_push($errors, $error_msg_2);
}

//add optional filter for checking whether email, returns false if not a valid email
if ($input_email === false || empty($input_email)) {
  $error_msg_3 = "Please enter a valid email address!";
  array_push($errors, $error_msg_3);
}

//add optional filter for checking whether integer, returns false if not an integer 
if ($input_age === false || empty($input_age)) {
  $error_msg_4 = "Please enter your age. Age must be a number value";
  array_push($errors, $error_msg_4);
}

if (empty($input_fav_song)) {
  $error_msg_5 = "Don't forget to share your favourite song!";
  array_push($errors, $error_msg_5);
}

if (empty($input_genre) || empty($input_artist)) {
  $error_msg_6 = "Don't forget to share the genre & artist name";
  array_push($errors, $error_msg_6);
}

if ($responseData["success"] === false) {
  $error_msg_7 = "No robots please!!";
  array_push($errors, $error_msg_7);
}
