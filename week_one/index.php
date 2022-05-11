<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP1006 - Week One</title>
</head>

<body>

    <?php

    //1.  Running Your First PHP Script 

    $myMessage = '<h1> Hello World! </h1>'; 
    echo $myMessage; 

    //2. Variable Intialization and Assignment & Displaying in the Browser 

    $num1 = 10; 
    $num2 = 30; 
    $total = $num1 + $num2; 

    echo "<p> $total </p>"; 


    /* Practice Activity One - create a variable to store your first name, create a variable to store your last name, combine first and last and echo on the screen */

    $firstName = "Jessica"; 
    $lastName = "Gilfillan"; 
    $fullName = "<p> $firstName $lastName </p>"; 

    print $fullName; 


    /* 3.  Data Types & Functions */

    //array built in function, three types of arrays 


    //indexed arrays 

    $myArray = array(1,2,3,4,5); 

    //associative arrays 

    $myAssocArray = array('First Place' => 'Abimbola', 'Second Place' => 'Gurjeet', 'Third Place' => 'Alexander'); 

    //multidimensional arrays 

    $multiArray = array (1, 2, 3, array(1,2,3)); 


    // Practice Activity 

    //a.) Access the second value in the indexed array and store in a variable 

        $a = $myArray[1]; 
        echo $a; 

   // b.) Access the third value in the associative array and store in a variable 

        $b = $myAssocArray['Third Place']; 
        echo $b;
    //c.) Access the third item of the array inside of the array and store in a variable 
    
        $c = $multiArray[3][2]; 

    //Practice Challenge - loop through the items in the first array and print to the screen 

    //for loop

    for($i = 0; $i < count($myArray); $i++) {
        echo "<p> $myArray[$i] </p>"; 
    }

    //foreach loop 

    foreach($myArray as $array) {
        echo "<p> $array </p>"; 
    }

    //user defined functions 
    //function definition

    function myPHPFunction($number1, $number2) {
        $total = $number1 + $number2; 
        echo "<p> $total </p>"; 
    }

    //function invocation 
    myPHPFunction(10, 20); 

    //Practice Activity - create a simple function to accept a message as an argument, call that function 

    //define the function 
    function message($message) {
        echo '<p>' . $message . '</p>'; 
    }

    //call the function 
    message('What up?'); 


    // 4. Objects in PHP 
    //To create an Object in PHP, use the new operator to instantiate a class

    //instantiate a new object based on the class 

    class Course {
        public function __construct($code, $instructor)
        {
            $this->code = $code; 
            $this->instructor = $instructor; 
        }
        public function courseInfo(){
            echo '<p> This is ' . $this->code . ' and the instructor is ' . $this->instructor . '!'; 
        }
    }

    $comp1006 = new Course ('COMP1006', 'Jessica'); 
    $comp1006->courseInfo(); 


    /*Practice Activity - Create a class to represent a person, with properties for first and last name and a method to display first and last name in the browser. Instantiate a new object to represent you based on this class, call the method */


    //5. Scope in PHP 


    $myLocalVar = 'This is a localVar'; 

    function scopeExample() {
        //global $myLocalVar; 
        $message = $GLOBALS['myLocalVar']; 
        echo $message; 
    }

   scopeExample(); 



    ?>
</body>

</html>