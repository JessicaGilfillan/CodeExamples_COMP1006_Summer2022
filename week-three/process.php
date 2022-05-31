<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COMP1006 - Week 3 - Saving & Retrieving Data </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Piedra&family=Quicksand&display=swap" rel="stylesheet">
  <link href="main.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <header>
      <h1> TuneShare - Share Your Fave Tunes & Join The Community </h1>
    </header>
    <main>
      <?php

      try {
        //create variables to store form data 
        $firstname = filter_input(INPUT_POST, 'fname');
        $lastname = filter_input(INPUT_POST, 'lname');
        $location = filter_input(INPUT_POST, 'location');
        $email = filter_input(INPUT_POST, 'email');
        $age = filter_input(INPUT_POST, 'age');
        $favsong = filter_input(INPUT_POST, 'favsong');
        $genre = filter_input(INPUT_POST, 'genre');
        $artist = filter_input(INPUT_POST, 'artist');

        //Connect to the database 
        require('connect.php');

        //Set up the SQl statement 
        $sql = "INSERT INTO songs(first_name,last_name, location, email, age, favsong, genre, artist) VALUES (:firstname,:lastname, :location, :email, :age, :favsong, :genre, :artist);";

        //call the prepare method of the PDO object, returns a PDOStatement Object 
        $statement = $db->prepare($sql);

        //bind Parameters 
        $statement->bindParam(':firstname', $firstname);
        $statement->bindParam(':lastname', $lastname);
        $statement->bindParam(':location', $location);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':age', $age);
        $statement->bindParam(':favsong', $favsong);
        $statement->bindParam(':genre', $genre);
        $statement->bindParam(':artist', $artist);

        //execute the query 
        $statement->execute();

        echo "<p> Thanks for submitting! </p>";

        //close DB connection 
        $statement->closeCursor();
      } catch (PDOException $e) {
        echo "<p> Sorry! Something went wrong!! </p>";
        $error = $e->getMessage();
        echo "<p> $error </p>";
      }

      ?>
      <a href="index.php" class="error-btn"> Back to Form </a>
    </main>
    <footer>
      <p> &copy; <?php echo getdate()['year']; ?> </p>
    </footer>
  </div>
  <!--end container-->
</body>

</html>