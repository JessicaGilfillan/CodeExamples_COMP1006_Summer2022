<!-- this is a restricted page - only logged in users should be able to view -->
<?php require_once 'auth.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title> COMP1006 - Week 9 - Authentication </title>
    <!-- Custom styles -->
    <link href="main.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- add personalization by displaying the username -->
                <?php if (isset($_SESSION['username'])) {
                    echo "<h1> Hey There " . $_SESSION['username'] . "! </h1>";
                } ?>
                <a href="logout.php" class="btn btn-primary"> Logout? </a>
            </div>
            <div class="col-md-6">
                <img src="assets/weirdcat.jpg" alt="weird cat" class="img-fluid">
            </div>
        </div>
    </div>
</body>
</html>