 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>COMP1006 - Week 3 - Saving & Retrieving Data  </title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Bootstrap -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 </head>

 <body>
   <div class="container">
     <header>
       <h1> TuneShare - Share Your Fave Tunes & Join The Community </h1>
     </header>
     <main>

       <p> Looking for new songs to add to your work at home playlist? Join our community and share with other music lovers! </p>
       <form action="process.php" method="post" class="form">
         <div class="form-group">
           <label for="fname"> Your First Name </label>
           <input type="text" name="fname" class="form-control" id="fname">
         </div>
         <div class="form-group">
           <label for="lname"> Your Last Name </label>
           <input type="text" name="lname" class="form-control" id="lname">
         </div>
         <div>
           <label for="location"> Your Location </label>
           <input type="text" name="location" class="form-control" id="location">
         </div>
         <div class="form-group">
           <label for="location"> Your Age </label>
           <input type="number" name="age" class="form-control" id="age">
         </div>
         <div class="form-group">
           <label for="email"> Your Email </label>
           <input type="text" name="email" class="form-control" id="email">
         </div>
         <div class="form-group">
           <label for="favsong"> What Song Should We Add to the List This Month?</label>
           <input type="text" name="favsong" class="form-control" id="favsong">
         </div>
         <div class="form-group">
           <label for="genre"> Song Genre </label>
           <input type="text" name="genre" class="form-control" id="genre">
         </div>
         <div class="form-group">
           <label for="artist"> Artist </label>
           <input type="text" name="artist" class="form-control" id="artist">
         </div>
         <input type="submit" name="submit" value="Submit" class="btn btn-primary">
       </form>
     </main>
     <footer>
       <p> &copy; <?php echo getdate()['year']; ?> </p>
     </footer>
   </div>
   <!--end container-->
 </body>

 </html>