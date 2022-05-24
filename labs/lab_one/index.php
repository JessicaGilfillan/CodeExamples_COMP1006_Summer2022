<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Tracker - Lab One</title>
</head>
<body>
    <h1> Task Tracker </h1>
    <form action="addtask.php" method="post">
        <input type="text" name="description" placeholder="Task Name">
        <label for="type"> Type of Task </label> 
        <select id="type" name="type">
            <option value="school"> School </option>
            <option value="personal"> Personal </option>
            <option value="work"> Work </option>
        </select>
        <input type="date" name="date" placeholder="Due Date">
        <input type="submit" name="submit" value="Add Task">
    </form>
</body>
</html>