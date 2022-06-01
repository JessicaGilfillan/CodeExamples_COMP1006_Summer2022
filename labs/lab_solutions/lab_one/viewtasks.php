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
    <h2> Filter Tasks By Category </h2>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <select name="category">
            <option value="all">All</option>
            <option value="work">Work</option>
            <option value="school"> School </option>
            <option value="personal"> Personal </option>
        </select>
        <input type="submit" value="Submit" name="submit">
    </form>
    <?php

    //connect 
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        $task_category = "";
        $task_category = filter_input(INPUT_POST, 'category');
        //set up statement 
        if ($task_category === "work" || $task_category === "school" || $task_category === "personal") {
            $sql = "SELECT * FROM tasks WHERE type = :task_category";
        } else if ($task_category === "all") {
            $sql = "SELECT * FROM tasks";
        }
        //prepare statement
        $statement = $db->prepare($sql);
        if ($task_category === "work" || $task_category === "school" || $task_category === "personal") {
            $statement->bindParam(":task_category", $task_category);
        }
        //execute 
        $statement->execute();
        //use fetchAll( ) method 
        $tasks = $statement->fetchAll();
        //loop through 
        echo "<ul>";
        foreach ($tasks as $task) {
            echo "<li>" . $task['date'] . " - " . $task['description'] . " - " . $task['type'] . "</li>";
        }
        //close db 
        $statement->closeCursor();
    }

    ?>

</body>

</html>