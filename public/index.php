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
    <h3>Tasks:</h3>
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
        complete($conn);
    }

    include_once "functions/printtask.php";
    echo printtask($conn, false);

    ?>
    </ul>
    
    </section>
    <section>
    <h3>Completed Tasks:</h3>
    <ul>
    <?php 
    
    include_once "functions/printcomptask.php";
    
    if (isset($_POST['undo'])) {
        include_once "functions/complete.php";
        complete($conn);
        header("Refresh:0");
    }
    echo printcomptask($conn, true);
    ?>
    </ul>
    </section>
</body>
</html>