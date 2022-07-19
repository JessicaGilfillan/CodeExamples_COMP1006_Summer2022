<?php require 'header.php' ?>
<div class="container">
    <h1> Cool Cats</h1>
    <div class="row">
        <div class="col-md-6">
            <h2> Not a Member? Register Right Meow! </h2>
            <form action="register.php" method="post">
                <input type="text" name="first_name" placeholder="Enter Your First Name" class="form-control">
                <input type="text" name="last_name" placeholder="Enter Your Last Name"  class="form-control">
                <input type="text" name="username" placeholder="Choose a Username"  class="form-control">
                <input type="email" name="email" placeholder="Enter Your Email Address"  class="form-control">
                <input type="password" name="password" placeholder="Choose a Password"  class="form-control">
                <input type="password" name="confirm_password" placeholder="Confirm Your Password" class="form-control">
                <input type="submit" name="submit" value="Sign Up" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-6">
            <h2> Already a Cool Cat? Sign In Here! </h2>
            <form action="login.php" method="post">
                <input type="text" name="user_login" placeholder="Username or Email Address" required class="form-control">
                <input type="password" name="password" placeholder="Choose a Password" required class="form-control">
                <input type="submit" name="submit" value="Login" class="btn btn-primary">
            </form>

        </div>
    </div>
    <!--end row -->
</div>
<!--end container -->