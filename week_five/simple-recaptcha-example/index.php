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
          //check that checkbox has been checked 
          if(!empty($_POST['g-recaptcha-response'])) {
              //verify the response
              $secret = '6LdEJ1QgAAAAAHvdyiusPv5v1R2ypdGrUn0xrY6D'; 
              $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='. $secret . '&response=' . $_POST['g-recaptcha-response']); 
              var_dump($verifyResponse); 
              $responseData = json_decode($verifyResponse, true);
              if($responseData['success'] === true) {
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS); 
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL ); 
                echo "<div class='alert alert-success'>
                <p> Hey there $name. Your email is $email </p>
                </div>"; 
              }
              else {
                echo "<div class='alert alert-danger'><p> No robots allowed!</p></div>";
              }
          }
          else {
            echo "<div class='alert alert-danger'><p> Please let us know that you are not a robot </p></div>";
          }
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
            <div class="g-recaptcha" data-sitekey="6LdEJ1QgAAAAAB8--vov2p32u15pnrtxgmWdSJS0"></div>
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>

</html>