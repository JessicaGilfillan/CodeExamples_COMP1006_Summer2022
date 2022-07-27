<?php
//AWS 
try {
    //data source name 
    $dsn = 'mysql:host=localhost;dbname=COMP1006_Summer2022';
    //username
    $username = 'root'; 
    //password
    $password = 'root';
    $db = new PDO($dsn, $username, $password);
    //set the errormode to exception 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
   //send the user to an error page 
   header('Location: error.php'); 

   $error_message = $e->getMessage(); 
   $error_line = $e->getLine();
   $error_file = $e->getFile();   
   $msg = "There was an error connecting to the database. The error is" . $error_message . "It occured in " . $error_file . "on line " . $error_line . ".";
   //error logging - send to email or error log 
   // error_log($msg, 0);
   //error_log($msg, 1, "jessicagilfillan@gmail.com");
   error_log($msg, 3, "my-error-file.log");
}


/*try {
    //data source name 
    $dsn = 'mysql:host=localhost;dbname=COMP1006_Summer2022';
    //username
    $username = 'root'; 
    //password
    $password = 'root';
    $db = new PDO($dsn, $username, $password);
    //set the errormode to exception 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
   //send the user to an error page 
   header('Location: error.php'); 

   $error_message = $e->getMessage(); 
   $error_line = $e->getLine();
   $error_file = $e->getFile();   
   $msg = "There was an error connecting to the database. The error is" . $error_message . "It occured in " . $error_file . "on line " . $error_line . ".";
   //error logging - send to email or error log 
   // error_log($msg, 0);
   //error_log($msg, 1, "jessicagilfillan@gmail.com");
   error_log($msg, 3, "my-error-file.log");
}
*/

?>