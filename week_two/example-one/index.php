<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <main>
            <header>
                <h1> Week Two - Sending & Receving Data  </h1> 
            </header>
            <section>
                <form action="process.php" method="post">
                    <label for="firstname">First Name: </label>
                    <input type="text" name="firstname" id="firstname" class="form-control">
                    <label for="lastname">Last Name </label>
                    <input type="text" name="lastname" id="lastname" class="form-control">
                    <label for="email">Email </label>
                    <input type="email" name="email" id="email" class="form-control">
                    <input type="submit" name="submit" value="Send It!">
                </form> 
            </section>
            <footer>
            </footer>
        </main>
    </body>
</html>