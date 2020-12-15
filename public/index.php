<?php 
include_once "db/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do-List</title>
</head>
<body>
    <h1>pawesome todolist</h1>
    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="title">Task Title:</label>
        <input name="title" type="text">
        <label for="tasktext">Enter your Task:</label>
        <textarea rows="4" cols="50" name="tasktext" type="text"></textarea>
        <input type="submit" name="createtask" value="Create Task">
    </form>
    <?php
    if (isset($_POST['createtask'])){
        include_once "functions/handleinput.php";
    }
    ?>
    <section>
    <ul>
    <?php 
    if (isset($_POST['update'])) {
        include_once "functions/handleupdates.php";
    }
     if (isset($_POST['delete'])) {
    include_once "functions/handledelete.php";
    }
    if (isset($_POST['completed'])) {
        include_once "functions/complete.php";
    }

    include_once "functions/printtask.php";
    echo printtask(false);

    ?>
    </ul>
    <?php 
   
    ?>
    </section>
</body>
</html>