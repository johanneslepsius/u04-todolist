<?php
function printtask(PDO $conn, $completed){

    $query = "SELECT * FROM tasks WHERE completed = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$completed]);
    $result = $stmt->fetchAll();


    foreach ($result as $task) {
        $listitem = "<li><form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF'])
        . "'><input type='submit' name='completed' value='Complete'>
            <input name='title' type='text' value='$task[title]'> 
            <input name='tasktext' type='text' size='50' value='$task[tasktext]'>
            <input type='hidden' name='taskid' value='$task[id]'>
            <input type='submit' name='update' value='Update'>
            <input type='submit' name='delete' value='Delete'>
        </form>
        </li>";
        echo $listitem;
    }
}