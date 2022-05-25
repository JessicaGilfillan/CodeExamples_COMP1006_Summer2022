<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COMP1006 - Week 3 - Saving & Retrieving Data  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="main.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <header>
      <h1> TuneShare - Share Your Fave Tunes & Join The Community </h1>
    </header>
    <main class="view">
      <?php
      
      //connect to our db 
      require('connect.php'); 

      //set up SQL statement 
      $sql = "SELECT * FROM songs;"; 

      //prepare the query 
      $statement = $db->prepare($sql); 

      //execute 
      $statement->execute(); 

      //use fetchAll to store the results 
      $songs = $statement->fetchAll(); 

      //build the top of the table 
      echo "<table><tbody>";

      foreach($songs as $song) {
        echo "<tr><td>"
        . $song['first_name'] . "</td><td>" . $song['last_name'] ."</td><td>" . $song['location'] . "</td><td>" . $song['email'] . "</td><td>" . $song['age'] . "</td><td>" . $song['favsong']  . "</td><td>" . $song['artist'] . "</td><td>" . $song['genre'] . "</td></tr>"; 
      }

      echo "</tbody></table>";

      //close the db connection 

      $statement->closeCursor(); 
      ?>
      <footer>
        <p> &copy; <?php echo getdate()['year']; ?> TuneShare </p>
      </footer>
  </div>
  <!--end container-->
</body>

</html>