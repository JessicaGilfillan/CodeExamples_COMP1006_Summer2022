<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Three - Update Practice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1> Lab Three - Update Practice </h1>
        <?php
        require_once('connect.php');

        //set up SQL statement 
        $sql = "SELECT * FROM students1;";

        //prepare the query 
        $statement = $conn->prepare($sql);

        //execute 
        $statement->execute();

        //use fetchAll to Fetch all remaining rows in a result set
        $students = $statement->fetchAll();

        // echo out the top of the table 

        echo "<table class='table'><tbody>";

        // Step One - Add Edit & Delete Button to the UI to allow users to edit & delete 
        foreach ($students as $student) {
            echo "<tr><td>"
                . $student['firstname'] . "</td><td>" . $student['lastname'] . "</td><td><a href='update.php?id=" . $student['user_id'] . "'class='btn btn-primary'> Update Name </a></td></tr>";
        }

        echo "</tbody></table>";

        $statement->closeCursor();

        ?>
        <div>
</body>

</html>