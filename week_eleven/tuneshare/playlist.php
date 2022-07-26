<!--only authenticated users should have access to this page -->
<?php require_once('auth.php'); ?>
<?php require_once('header.php'); ?>
<div class="container">
  <header>
    <h1> Tuneshare </h1>
    <h2> Latest Playlist </h2>
  </header>
  <main class="view">
    <div class="row">
      <div class="col-md-4">
        <img src="assets/music file2-10.svg" alt="listening to music illustration">
      </div>
      <div class="col-md-8">
        <form method="get" action="search_results.php" class="search-form">
          <div class="form-group">
            <label for="keywords"> Search for a Tune: </label>
            <input type="text" name="keywords" class="form-control" />
          </div>
          <input type="submit" value="Search" class="btn btn-primary" />
        </form>
        <a href="add_song.php" class="btn ts_button"> Add A New Song to the List </a>
        <?php
        try {
          //connect to our db 
          require_once('connect.php');
          //set up SQL statement 
          $sql = "SELECT * FROM songs1;";
          //prepare the query 
          $statement = $db->prepare($sql);
          //execute 
          $statement->execute();
          //use fetchAll to Fetch all remaining rows in a result set
          $records = $statement->fetchAll();
          // echo out the top of the table 
          echo "<table class='table'><tbody>";
          // Step One - Add Edit & Delete Button to the UI to allow users to edit & delete 
          foreach ($records as $record) {
            echo "<tr><td><a href='". $record['link']. "'>" .
                $record['favsong'] . "</a></td><td>" .  $record['genre'] . "</td><td>" . $record['artist'] . "</td><td><a href='add_song.php?id=" . $record['song_id'] . "'class='btn btn-primary'> Update Song </a></td><td>
              
              <a href='delete.php?id=" . $record['song_id'] .
              "'class='btn btn-danger' id='delete' onclick='return confirm(\"Are you sure?\");' > Delete Tune </a></td></tr>";
          }

          echo "</tbody></table>";
        } catch (PDOException $e) {
          header('Location: error.php');
          $error_message = $e->getMessage();
          $msg = "There was an error when user attempted to view the playlists. Error Message: " . $error_message . ".";
          //send error email to dev/admin 
          mail("jessicagilfillan@gmail.com", "App Error - Show Playlist", $msg);
        } finally {
          $statement->closeCursor();
        }
        ?>
      </div>
    </div>
    <!--end row-->
  </main>
  <!-- require global footer -->
  <?php require_once('footer.php'); ?>