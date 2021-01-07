<?php

function printcomptask(PDO $conn, $completed){

    $query = "SELECT * FROM tasks WHERE completed = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$completed]);
    $result = $stmt->fetchAll();


    foreach ($result as $task) {
        $listitem = "<li><form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF'])
        . "'><input type='submit' name='undo' value='Undo'>
            <p><del>$task[title] $task[tasktext]</del></p>
            <input type='hidden' name='taskid' value='$task[id]'>
            <input type='submit' name='delete' value='Delete'>
        </form>
        </li>";
        echo $listitem;
    }
}