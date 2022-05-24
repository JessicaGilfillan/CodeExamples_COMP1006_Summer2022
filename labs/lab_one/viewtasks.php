<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>

<body>
    <h1> Your Task List </h1>
    <?php
    //connect 
    require_once('connect.php');
    //set up statement 
    $sql = "";
    //prepare statement

    //execute 

    //use fetchAll()to fetch all remaining rows in a result set

    echo "<ul>";
    foreach ($tasks as $task) {
        echo "<li>" . $task['date'] . " - " . $task['description'] . " - " . $task['type'] . "</li>";
    }

    //close db  
    ?>

</body>

</html>