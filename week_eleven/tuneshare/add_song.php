<!--only authenticated users should see this content -->
<?php require "auth.php" ?>
<!-- require global header -->
<?php require_once('header.php'); ?>
<div class="container">
    <header>
        <h1> Tuneshare </h1>
        <h2> Share Your Fave Tune With The World </h2>
    </header>
    <main>
        <?php
        //intialize variables 
        $favsong = null;
        $genre = null;
        $artist = null;
        $songid = null;
        //get song id from URL string if present/editing 
        $songid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        //if the song id is not empty, we are editing 
        if (!empty($songid)) {
            try {
                //connect to the database 
                require_once('connect.php');
                //set up our query
                $sql = "SELECT * FROM songs1 WHERE song_id = :song_id;";
                //prepare our statement
                $statement = $db->prepare($sql);
                //bind 
                $statement->bindParam(':song_id', $songid);
                //execute 
                $statement->execute();
                //use fetchAll to store 
                $songs = $statement->fetchAll();
                //to loop through, use a foreach loop to access the table data and store in varaibles 
                foreach ($songs as $song) :
                    $favsong = $song['favsong'];
                    $artist = $song['artist'];
                    $genre = $song['genre'];
                    $link = $song['link'];
                endforeach;
                //close the db connection 
                $statement->closeCursor();
            } catch (PDOException $e) {
                header('location:error.php');
            }
        }
        //if the form has been submited, process the form information 
        else if (isset($_POST['submit'])) {
            //check whether the recaptcha was checked by the user 
            //create variables to store form data, using filter input to validate & sanitize 
            /*https://www.php.net/manual/en/filter.filters.sanitize.php*/
            $input_favsong = filter_input(INPUT_POST, 'favsong', FILTER_SANITIZE_SPECIAL_CHARS);
            $input_genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_SPECIAL_CHARS);
            $input_artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_SPECIAL_CHARS);
            $input_link = filter_input(INPUT_POST, 'link');
            $id = null;
            $id = filter_input(INPUT_POST, 'song_id');
            
            //create an empty errors array to store error messages 
            $errors = [];

            //form validation 
            if (empty($input_genre) || empty($input_artist) || empty($input_favsong) || empty($input_link)) {
                $error_msg = "Don't forget to share the name, genre, artist & link!";
                array_push($errors, $error_msg);
            }

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

                    //if not empty, we are editing an exisiting record in the database table 
                    if (!empty($id)) {
                        $sql = "UPDATE songs1 SET favsong = :favsong, artist = :artist, genre = :genre, link = :link WHERE song_id = :id";
                    //if id is empty, we are creating a new record in the database table 
                    } else { 
                        // set up an SQL command to save the info 
                        $sql = "INSERT INTO songs1 (favsong, artist, genre, link) VALUES (:favsong, :artist, :genre, :link);";
                    }

                    //call the prepare method of the PDO object, return PDOStatement Object
                    $statement = $db->prepare($sql);

                    //bind parameters
                    $statement->bindParam(':favsong', $input_favsong);
                    $statement->bindParam(':artist', $input_artist);
                    $statement->bindParam(':genre', $input_genre);
                    $statement->bindParam(':link', $input_link);

                    //bind user id if needed (editing)
                    if (!empty($id)) {
                        $statement->bindParam(':id', $id);
                    }

                    //execute the query 
                    $statement->execute();

                    //redirect the user to the updated playlist page 
                    header("Location: playlist.php");
                } catch (Exception $e) {
                    $error_message = $e->getMessage();
                    //send email 
                    //mail("jessicagilfillan@gmail.com", "TuneShareError", "An Error has occured " + $error_message);
                    //log error 
                    error_log($error_message, 3, "my-error-file.log");
                    //redirect user to custom error page 
                    header('Location: error.php'); 
                } finally {
                    //close the db connection 
                    $statement->closeCursor();
                }
            }
        }
        ?>
        <!-- Here's the html form! -->
        <div class="row">
            <div class="col-md-6">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
                    <!-- add hidden input with user id if editing -->
                    <input type="hidden" name="song_id" value="<?php echo $songid; ?>">
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
                    <div class="form-group">
                        <label for="link"> Link </label>
                        <input type="url" name="link" class="form-control" id="link" value="<?php echo $link; ?>" required>
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
    <!-- require global footer -->
    <?php require_once('footer.php'); ?>