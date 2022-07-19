<!-- this is a restricted page - only logged in users should be able to view -->
<?php require_once 'auth.php' ?>
<?php require_once 'header.php' ?>

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