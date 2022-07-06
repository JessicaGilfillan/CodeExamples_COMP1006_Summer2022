  <!-- require global header -->
  <?php require_once('header.php'); ?>
  <div class="container">
    <header>
      <h1> Tuneshare </h1>
      <h2> Share Your Fave Tune With The World </h2>
    </header>
    <main>
      <?php
      //Step Three - add the ability for users to use the form to edit their information as well as add new information to the DB. To do this, we'll check if the user is editing and, if so, we'll populate the form with the values they want to change. When the user submits the form, their record will be updated. 

      //intialize variables 

      $firstname = null;
      $lastname = null;
      $location = null;
      $email = null;
      $age = null;
      $favsong = null;
      $genre = null;
      $artist = null;

      //check if there is a user_id available in URL string, then prepare and execute a query that will return the information associated with the user_id selected 

      $userid = null;
      $userid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

      if (!empty($userid) && $userid !== false) {
        try {
          //connect to the database 
          require_once('connect.php');
          //set up our query 
          $sql = "SELECT * FROM songs WHERE user_id = :user_id;";
          //prepare our statement
          $statement = $db->prepare($sql);
          //bind 
          $statement->bindParam(':user_id', $userid);
          //execute 
          $statement->execute();
          //use fetchAll to store 
          $records = $statement->fetchAll();
          //to loop through, use a foreach loop 
          foreach ($records as $record) :
            $firstname = $record['first_name'];
            $lastname = $record['last_name'];
            $genre = $record['genre'];
            $age = $record['age'];
            $location = $record['location'];
            $email = $record['email'];
            $favsong = $record['favsong'];
            $artist = $record['artist'];
          endforeach;
        } catch (PDOException $e) {
          header('location:error.php');
        } finally {
          //close the db connection 
          $statement->closeCursor();
        }
      }
      //if the form has been submited, process the form information 
      if (isset($_POST['submit'])) {
        //check whether the recaptcha was checked by the user 
        if (!empty($_POST['g-recaptcha-response'])) {
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
          $id = null;
          $id = filter_input(INPUT_POST, 'user_id');

          $secret = '6LfePG4gAAAAAASIYzASMEqTP1LD44Q5LVsv3NU9';
          $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);

          $responseData = json_decode($verifyResponse, true);

          require('validate.php');

          //if there are errors, display them 
          if (!empty($errors)) {
            echo "<div class='error_msg alert alert-danger'>";
            foreach ($errors as $error) {
              echo "<p>" . $error . "</p>";
            }
            echo "</div>";
            //no errors, go ahead and process the form 
          } else {
            try {
              //connect to database 
              require_once('connect.php');

              // set up SQL command to insert data into table
              //if we have an id, we are editing (UPDATE), if not, we will be adding information to the table (INSERT)

              if (!empty($id)) {
                $sql = "UPDATE songs SET first_name = :firstname, last_name = :lastname, location = :location, email = :email, age = :age, favsong = :favsong, genre = :genre, artist = :artist WHERE user_id = :id";
              } else {
                //this is a new tune we are adding to our app 
                // set up an SQL command to save the info 
                $sql = "INSERT INTO songs (first_name, last_name, location, email, age, favsong, genre, artist) VALUES (:firstname, :lastname, :location, :email, :age, :favsong, :genre, :artist);";
              }

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
              //bind user id if needed 
              if (!empty($id)) {
                $statement->bindParam(':id', $id);
              }

              //execute the query 
              $statement->execute();

              //redirect the user to the updated playlist page 
              header("Location: playlist.php");
            } catch (Exception $e) {
              echo "<p> Sorry! Something has gone wrong on our end! An email has been sent to our admin team </p>";
              $error_message = $e->getMessage();
              //send email 
              mail("jessicagilfillan@gmail.com", "TuneShareError", "An Error has occured " + $error_message);
              //log error 
              error_log($msg, 3, "my-error-file.log");
            } finally {
              //close the db connection 
              $statement->closeCursor();
            }
          }
        } else {
          echo "<p class='alert alert-danger'> Please let us know you are not a robot! </p>";
        }
      }
      ?>
      <div class="row">
        <div class="col-md-6">
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
            <!-- add hidden input with user id if editing -->
            <input type="hidden" name="user_id" value="<?php echo $userid; ?>">
            <div class="form-group">
              <label for="fname"> Your First Name </label>
              <input type="text" name="fname" class="form-control" id="fname" value="<?php echo $firstname; ?>" required>
            </div>
            <div class="form-group">
              <label for="lname"> Your Last Name </label>
              <input type="text" name="lname" class="form-control" id="lname" value="<?php echo $lastname; ?>" required>
            </div>
            <div>
              <label for="location"> Your Location </label>
              <input type="text" name="location" class="form-control" id="location" value="<?php echo $location; ?>" required>
            </div>
            <div class="form-group">
              <label for="location"> Your Age </label>
              <input type="number" name="age" class="form-control" id="age" value="<?php echo $age; ?>" required>
            </div>
            <div class="form-group">
              <label for="email"> Your Email </label>
              <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
              <label for="favsong"> What Song Should We Add to the List This Month?</label>
              <input type="text" name="favsong" class="form-control" id="favsong" value="<?php echo $favsong; ?>" required>
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
              <input type="text" name="artist" class="form-control" id="artist" value="<?php echo $artist; ?>" required>
            </div>
            <!-- add the recpatcha widget -->
            <div class="g-recaptcha" data-sitekey="6LfePG4gAAAAADZ2lT_AlrPCCXB65KnudqxZMsdZ"></div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
          </form>
        </div>
        <div class="col-md-6">
          <img src="assets/music file2-07.svg" alt="listening to music illustration">
        </div>
      </div>
      <!--end row-->
    </main>
    <!-- require global footer -->
    <?php require_once('footer.php'); ?>