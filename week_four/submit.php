 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Tunshare - User Generated Playlist Generator </title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
   <link href="css/main.css" rel="stylesheet">
 </head>

 <body class="submit">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container-fluid">
       <a class="navbar-brand" href="index.php">Tuneshare</a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
           <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="index.php">Home</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="about.php">About</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="submit.php">Submit</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="playlist.php">Playlists</a>
           </li>
         </ul>
       </div>
     </div>
   </nav>
   <div class="container">
     <header>
       <h1> Tuneshare </h1>
       <h2> Share Your Fave Tune With The World </h2>
     </header>
     <main>
       <?php
        if (isset($_POST['submit'])) {
          //create variables to store form data, using filter input to validate & sanitize 
          /*https://www.php.net/manual/en/filter.filters.sanitize.php*/
          $input_firstname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
          $input_lastname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
          $input_location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_SPECIAL_CHARS);
          $input_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
          $input_age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
          $input_fav_song = filter_input(INPUT_POST, 'favsong', FILTER_SANITIZE_SPECIAL_CHARS);
          $input_genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_SPECIAL_CHARS);
          $input_artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_SPECIAL_CHARS);

          echo $input_firstname;

          require('validate.php');

          if (!empty($errors)) {
            echo "<div class='error_msg alert alert-danger'>";
            foreach ($errors as $error) {
              echo "<p>" . $error . "</p>";
            }
            echo "</div>";
          } else {

            try {
              //connect to database 
              require_once('connect.php');

              // set up SQL command to insert data into table
              $sql = "INSERT INTO songs (first_name, last_name, location, email, age, favsong, genre, artist) VALUES (:firstname, :lastname, :location, :email, :age, :favsong, :genre, :artist);";

              //call the prepare method of the PDO object, return PDOStatement Object
              $statement = $db->prepare($sql);

              //bind parameters
              $statement->bindParam(':firstname', $input_firstname);
              $statement->bindParam(':lastname', $input_lastname);
              $statement->bindParam(':genre', $input_genre);
              $statement->bindParam(':location', $input_location);
              $statement->bindParam(':email', $input_email);
              $statement->bindParam(':age', $input_age);
              $statement->bindParam(':favsong', $input_fav_song);
              $statement->bindParam(':genre', $input_genre);
              $statement->bindParam(':artist', $input_artist);

              //execute the query 
              $statement->execute();

              //close the db connection 
              $statement->closeCursor();
              header("Location: playlist.php");
            } catch (PDOException $e) {
              echo "<p> Sorry! Something has gone wrong on our end! An email has been sent to our admin team </p>";
              $error_message = $e->getMessage();
              mail("jessicagilfillan@gmail.com", "TuneShareError", "An Error has occured " + $error_message);
              echo $error_message;
            }
          }
        }

        ?>
       <div class="row">
         <div class="col-md-6">
           <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
             <div class="form-group">
               <label for="fname"> Your First Name </label>
               <input type="text" name="fname" class="form-control" id="fname" required>
             </div>
             <div class="form-group">
               <label for="lname"> Your Last Name </label>
               <input type="text" name="lname" class="form-control" id="lname" required>
             </div>
             <div>
               <label for="location"> Your Location </label>
               <input type="text" name="location" class="form-control" id="location" required>
             </div>
             <div class="form-group">
               <label for="location"> Your Age </label>
               <input type="number" name="age" class="form-control" id="age" required>
             </div>
             <div class="form-group">
               <label for="email"> Your Email </label>
               <input type="email" name="email" class="form-control" id="email" required>
             </div>
             <div class="form-group">
               <label for="favsong"> What Song Should We Add to the List This Month?</label>
               <input type="text" name="favsong" class="form-control" id="favsong" required>
             </div>
             <div class="form-group">
               <label for="genre"> Genre </label>
               <select name="genre" class="form-select form-select-lg form-control" id="genre">
                 <option selected>Choose Genre</option>
                 <option value="pop"> Pop </option>
                 <option value="country"> Country </option>
                 <option value="rap"> Rap </option>
                 <option value="hip hop"> Hip Hop </option>
                 <option value="R & B"> Rhythm & Blues </option>
                 <option value="folk"> Folk/ Acoustic </option>
                 <option value="indie"> Indie </option>
                 <option value="ambient"> Ambient </option>
                 <option value="dance"> Dance/Electronic </option>
                 <option value="jazz"> Jazz </option>
                 <option value="metal"> Metal </option>
                 <option value="blues"> Blues </option>
                 <option value="latin"> Latin </option>
                 <option value="rock"> Rock </option>
                 <option value="punk"> Punk </option>
                 <option value="funk"> Funk </option>
                 <option value="reggae"> Reggae </option>
                 <option value="alternative"> Alternative </option>
                 <option value="k pop"> K Pop </option>
                 <option value="classical"> Classical </option>
               </select>
             </div>
             <div class="form-group">
               <label for="artist"> Artist </label>
               <input type="text" name="artist" class="form-control" id="artist" required>
             </div>
             <input type="submit" name="submit" value="Submit" class="btn btn-primary">
           </form>
         </div>
         <div class="col-md-6">
           <img src="assets/music file2-07.svg" alt="listening to music illustration">
         </div>
       </div>
       <!--end row-->
     </main>
     <footer>
       <p> &copy; <?php echo getdate()['year']; ?> </p>
     </footer>
   </div>
   <!--end container-->
 </body>

 </html>