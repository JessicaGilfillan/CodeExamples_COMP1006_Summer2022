<?php

//grab the information from the form using $_FILES
//the file name 
$image_name = $_FILES['image']['name'];
//the file type 
$image_type = $_FILES['image']['type']; //let's test again! :) 
//the size of the image 
$image_size = $_FILES['image']['size'];
//the temporary storage location 
$image_tmp = $_FILES['image']['tmp_name'];
//any errors/error code? 
$image_error = $_FILES['image']['error'];

//validate that the image is the right type and size and no errors on upload 

//first, let's check that we have the right type of file. We want the user to upload an image and images generally come on the following formats : jpeg, jpg, png, gif 

//connect to db
require_once('connect.php');

if ($image_type === 'image/jpeg' || $image_type === 'image/jpg' || $image_type === 'image/png' || $image_type === 'image/gif') {

    //but wait, we want to make sure the image is not HUGE!!!!
    //let's check file size 
    if ($image_size > 0 && $image_size < 32768) {
        //hold up - what if there was a problem uploading the image?
        //let's check for any error code, 0 means A-OK!
        if ($image_error === 0) {
            //proceed!!!!!
            //remember that databases are great at storing text based data, but not so good at storing images
            //instead of storing an image in the db table, we will store a reference to the image - the image name 
            //we'll store the actual image in a folder called images 
            //when the user clicks submit, the image will automatically be moved to a temporary storage location on the server - but we don't want it to stay there! 
            //we'll use move_uploaded_file( ) to move it to our target destintation (the images folder!)

            //move the file from temporary storage to the images folder 
            $to = 'images/' . $image_name;
            $from = $image_tmp;
            move_uploaded_file($from, $to);

            //save the info in the database (the name of the image)
            //set up an INSERT query
            $sql = "INSERT INTO images(images_name) VALUES (:image_name)";
            //prepare the query
            $statement = $db->prepare($sql);
            //bindParam 
            $statement->bindParam(':image_name', $image_name);
            //execute
            $statement->execute();
            //let's test it out! 
        } else {
            echo "<p> Sorry, there was a problem uploading your file! </p>";
        }
    } else {
        echo "<p> Your image is too big! </p>";
    }
} else {
    echo "<p> You must upload a jpeg, jpg, png or gif, my friend! </p>";
}

//the image name was successfully stored in the db & the file was moved to the images folder

//we're not done yet....

//display the image on the page 
//set up the SELECT query 
$query = "SELECT * FROM images";
//prepare 
$stmt = $db->prepare($query);
//execute!
$stmt->execute();
//use fetchAll the access all rows, store in $images
$images = $stmt->fetchAll();
//loop through the results using foreach() 
foreach ($images as $image) {
    //dynamically build the img element 
    echo "<img src='images/" . $image['images_name'] . "' alt='" . $image['images_name'] . "'>";
}
//i think we are done! let's close the db connection and test! 
$stmt->closeCursor();
?>