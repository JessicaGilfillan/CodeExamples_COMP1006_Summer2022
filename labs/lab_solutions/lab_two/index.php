<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab Two - Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous" async></script>
</head>

<body>
    <div class="container">
        <h1>Lab Two - Form Validation </h1>
        <!--add client-side form validation using HTML5 validation feature-->
        <!--added required attribue, min and max for age and type="number" and type="email" for age and email-->
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="name"> Name: </label>
                <input type="text" name="name" id="firstname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email"> Email: </label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="age"> Age: </label>
                <input type="number" name="age" id="age" class="form-control" min="17" max="110" required>
            </div>
            <div class="form-group">
                <label for="location"> Location: </label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>
            <input type="submit" value="Add Student" class="btn btn-primary" name="submit">

        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $name = filter_input(INPUT_POST, 'name');
        //add validation filter for email
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        //add validation filter for age
        $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
        $location = filter_input(INPUT_POST, 'location');

        //add server-side form validation here!
        //check if the user has provided required info 
        if (!empty($name) || !empty($email) || !empty($age) || !empty($location)) {
            //check that age and email are in the proper format 
            if ($age !== false && $email !== false) {
                //check that age is between 17 and 110 
                if ($age >= 17 && $age <= 110) {

                    //connect to db 
                    $dsn = 'mysql:host=localhost;dbname=COMP1006_Summer2022';
                    $username = 'root';
                    $password = 'root';
                    $db = new PDO($dsn, $username, $password);

                    //prepare the query 
                    $sql = "INSERT INTO students (name, email, age, location) VALUES (:name, :email, :age, :location)";

                    $statement = $db->prepare($sql);

                    //bindParam 
                    $statement->bindParam(':name', $name);
                    $statement->bindParam(':email', $email);
                    $statement->bindParam(':age', $age);
                    $statement->bindParam(':location', $location);

                    //execute 
                    $statement->execute();

                    //close cursor 
                    $statement->closeCursor();

                    echo "<p> Success! </p>";
                } else {
                    echo "<p> You must enter an age between 17 and 110!</p>";
                }
            } else {
                echo "<p> Please enter a valid email address and a number for your age. </p>";
            }
        } else {
            echo "<p> Please provide your name, age, email and location! </p>";
        }
    }


    ?>
</body>

</html>