<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Three - Update Practice</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php
    //connect to db
    require('connect.php');
     //get the user id 
    $user_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); 
    // set up statement 
    $sql = "SELECT * FROM students1 WHERE user_id = :user_id"; 
    //prepare 
    $statement = $conn->prepare($sql); 
    //bind
    $statement->bindParam(':user_id', $user_id); 
    //execute 
    $statement->execute(); 
    //fetchAll to fetch the remaining rows from a result set
    $students = $statement->fetchAll(); 
    //loop through the results, assign to variable 
    foreach($students as $student) {
        $firstname = $student['firstname'];
        $lastname = $student['lastname']; 
    }
    //close the connection to the db 
    $statement->closeCursor(); 
    ?>
    <div class="container">
        <h1> Update Your Information </h1>
        <form action="process.php" method="post">
            <input type="text" name="user_id" value="<?php echo $user_id ?>">
            <input type="text" name="firstname" placeholder="Enter Your First Name" value="<?php echo $firstname ?>" class="form-control">
            <input type="text" name="lastname" placeholder="Enter Your Last Name" value="<?php echo $lastname ?>" class="form-control">
            <input type="submit" value="Add Your Name" class="btn btn-primary">
        </form>
    </div>
</body>

</html>