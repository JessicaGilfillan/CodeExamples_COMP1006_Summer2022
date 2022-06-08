<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple reCAPTCHA Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- add recaptcha library -->
   <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>

<body>
    <div class="container">
        <?php
        //check if the form has been submitted 
        if (isset($_POST['submit'])) {
          // step three - verify the user response on the server side 



        }

        ?>

        <h1>Simple reCAPTCHA Example</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="name"> Your Name </label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="name"> Your Email </label>
                <input type="email" name="email" class="form-control">
            </div>
            <!-- step two - client-side integration  -->
            
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>

</html>