<!-- users are directed here if they try to access restricted content without logging in -->
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
          <h3> Sorry, only restricted users can view our super cool playlists </h3>
         <a href="register.php" class="ts_button">  Want to Join Us? </a>
         <a href="login.php" class="ts_button">  Need to Login? </a>
        </div>
      </div>
      <!--end row-->
    </main>
    <!--require global footer here -->
    <?php require_once('footer.php'); ?>