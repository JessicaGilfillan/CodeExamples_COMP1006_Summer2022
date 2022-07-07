This weeks code example includes: 

1.) form based authentication 
2.) password hashing 
3.) storing user info using sessions 


Files inclue: 

1.) index.php - homepage that includes a registration form and a sign in form 

2.) register.php - PHP script that validates & processes the registration form, performs password hashing using password_hash( ) and adds user info to a table in a MySQL database 

3.) login.php - PHP script that validates & processes the user login form. This script checks to see the user exists and then verifies the password matches the stored hashed password using password_verify(  ) 

4.) members.php - a page that only authenticated users should have access to 

5.) auth.php -  a PHP script that checks to see whether a user has been authenticated or not. If the user is not logged in, they will be redirected to the homepage. 

6.) logout.php - a PHP script that allows the user to logout, removing any session variables that have been set and destroying the session 

7.) restricted.php - a custom error page to let users know that the content they tried to access is restricted to logged in users 

