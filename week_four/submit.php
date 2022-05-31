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
   <!-- Add Boostrap Navbar here-->
   <div class="container">
     <header>
       <h1> Tuneshare </h1>
       <h2> Share Your Fave Tune With The World </h2>
     </header>
     <main>
       <?php

        //create variables to store form data, using filter input to validate & sanitize 
        /*https://www.php.net/manual/en/filter.filters.sanitize.php*/

        //create an empty array to store error messages 

        //what do we need to validate? 

        //if there are errors, display an error message above our form 

        //if no errors, add the information to our database

        //close the db connection 

        ?>
       <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
         <div class="form-group">
           <label for="fname"> Your First Name </label>
           <input type="text" name="fname" class="form-control" id="fname" required>
         </div>
         <div class="form-group">
           <label for="lname"> Your Last Name </label>
           <input type="text" name="lname" class="form-control" id="lname" required>
         </div>
         <div class="form-group">
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
       <img src="assets/musicfile2-07.svg" alt="listening to music illustration">
     </main>
     <footer>
       <p> &copy; <?php echo getdate()['year']; ?> </p>
     </footer>
   </div>
 </body>

 </html>