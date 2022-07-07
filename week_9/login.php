<?php
/* We need to check the records in our table to see whether the user exists. If the user exists, we then need to verify that the password entered matches the hashed password stored. We can do this using password_verify() */


//validate & store form info 



/* validation 
1.) all form fields are completed 
*/

if (empty($input_user_login)) {
    echo "<p> Please enter a username or email </p>";
} elseif (empty($input_password)) {
    echo "<p> Please enter a password </p>";
} else {
    try {
        ////connect to the db 
        
        //set up query to grab user info from the table  
        
        //prepare 
        
        //bind 
        
        //execute 
        //check if the user exists - i.e. there is a record in the table 
            //if so, fetch the information for the user 
           
                //check if the passwords match using password_verify 
                
                    //start a session and store the user's information
                  
                    // Store data in session variables
                  
                    // Redirect user to members page - only logged in users should be able to view 
                           
         
    } catch (Exception $e) {
        $errormessage = $e->getMessage();
        echo "<p> Opps! Something went wrong? </p>";
        echo $errormessage;
    } finally {
        $stmt->closeCursor();
    }
}
