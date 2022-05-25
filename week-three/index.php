 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>COMP1006 - Week 3 - Saving & Retrieving Data  </title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>

 <body>
   <div class="container">
     <header>
       <h1> TuneShare - Share Your Fave Tunes & Join The Community </h1>
     </header>
     <main>

       <p> Looking for new songs to add to your work at home playlist? Join our community and share with other music lovers! </p>
       <form action="process.php" method="post">
         <div >
           <label for="fname"> Your First Name </label>
           <input type="text" name="fname" id="fname">
         </div>
         <div>
           <label for="lname"> Your Last Name </label>
           <input type="text" name="lname" id="lname">
         </div>
         <div>
           <label for="location"> Your Location </label>
           <input type="text" name="location" id="location">
         </div>
         <div>
           <label for="location"> Your Age </label>
           <input type="number" name="age" id="age">
         </div>
         <div>
           <label for="email"> Your Email </label>
           <input type="text" name="email" id="email">
         </div>
         <div>
           <label for="favsong"> What Song Should We Add to the List This Month?</label>
           <input type="text" name="favsong" id="favsong">
         </div>
         <div>
           <label for="genre"> Song Genre </label>
           <input type="text" name="genre" id="genre">
         </div>
         <div>
           <label for="artist"> Artist </label>
           <input type="text" name="artist" id="artist">
         </div>
         <input type="submit" name="submit" value="Submit">
       </form>
     </main>
     <footer>
       <p> &copy; <?php echo getdate()['year']; ?> </p>
     </footer>
   </div>
   <!--end container-->
 </body>

 </html>