<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    /* Pair Programming is popular technique employed in agile programming. In this exercise, one person will write the code(devloper A) and the other person will describe the code (developer B), then switch roles (developer B codes and developer A describes)!


    /* PART ONE - DEVELOPER A CODES, DEVELOPER B DESCRIBES  */


    //Declare a vaiable called studentgrades 

    $studentGrades;

    // Create an associate array to store the following names and the grades they recieved on their midterm tes: Hatinder - 98, Sajan - 89, Felix - 90, Harpreet - 80, Tolu - 88, Xiyang - 85

    $studentGrades = array('Hatinder' => 98, 'Felix' => 90, 'Harpreet' => 80, 'Tolu' => 88, 'Xiyang' => 85);


    /* PART TWO - DEVELOPER B CODES, DEVELOPER A DESCRIBES  */

    //create a function to loop through the associate array, showing each students grade and name in the browser. Ensure you include appropriate HTML markup to add structure and meaning to the content. 

    function showGrades()
    {
        global $studentGrades;
        echo "<ul>";
        foreach ($studentGrades as $studentgrade => $studentname) {
            echo "<li> $studentgrade : $studentname </li>";
        }
    }

    showGrades();

    var_dump($studentGrades); 

    ?>

    
</body>

</html>