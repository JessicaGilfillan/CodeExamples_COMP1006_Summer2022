<!--require global header -->
<?php require_once('header.php'); ?>
<div class="container">
  <header>
    <h1> Tuneshare </h1>
    <h2> About TuneShare </h2>
  </header>
  <main class="view">
    <div class="row">
      <div class="col-md-4">
        <img src="assets/music file2-06.svg" alt="listening to music illustration">
      </div>
      <div class="col-md-8">
        <p> TuneShare is an interactive web application project built by COMP1006 during the Summer 2022 semester. This project allows students to learn basic web programming concepts using PHP. In particular, students will learn how to interact with a MySQL database in order to manage user data (Create, Read, Update, Delete). Over the course of 14 weeks, students will also learn about building secure web applications, form validation, authenticaion, API integration, version control, testing and launching a web application to a production server.
        <p class="special-text"> Resources/Tools Used to Create this Project Include: </p>
        <ul>
          <li> Bootstrap </li>
          <li> Google Web Fonts </li>
          <li> PHP/MYSQL Database </li>
          <li> SVG Illustrations from <a href="https://drawkit.com/"> https://drawkit.com/ </a></li>
        </ul>
      </div>

    </div>
    <div>
      <h3>Our Users</h3>
      <!-- dynamically populate the user list -->
        <?php
        //connect to db 
        require_once('connect.php');
        //set up query 
        $sql = "SELECT * FROM tuneshare_users";
        //prepare 
        $statement = $db->prepare($sql);
        //execute 
        $statement->execute();
        // use fetchAll to get all remaining data rows in the set, store in variable called users 
        $users = $statement->fetchAll();
        //create a div element
        echo "<div class='user_container'>";
        //loop through info stored in users using a foreach loop 
        foreach ($users as $user) {
          echo "<div class='user'>";
          echo "<img src='images/" . $user['profile_image'] . "' alt='" . $user['username'] . "'>";
          echo "<p>" . $user['username'] . "</p>";
          echo "</div>";
        }
        //create the closing div 
        echo "</div>";
        //close db connection
        $statement->closeCursor();
        ?>
      </div>
      <!--end row-->
  </main>
  <!--require global footer here -->
  <?php require_once('footer.php'); ?>