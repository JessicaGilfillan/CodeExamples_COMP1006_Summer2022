<?php require_once('header.php'); ?>
<!-- this is repeated in many of our files (as well as the footer!). Let's create a global header/global footer and then require when we need it -->
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
      <!--end row-->
    </main>
    <!--require global footer here -->
    <?php require_once('footer.php'); ?>