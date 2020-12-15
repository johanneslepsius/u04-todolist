<?php
function printtask($completed){
    // $query = "SELECT * FROM tasks WHERE completed = :completed";
    // $stmt = $conn->prepare($query);
    // $realquery = $stmt->execute(["completed"=>$completed]);
    $result = $conn->query("SELECT * FROM tasks WHERE completed = $completed")->fetchAll();
    foreach ($result as $task) {
        $listitem = "<li><form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF'])
        . "'><input type='submit' name='completed' value='Complete'><input name='title' type='text' value='$task[title]'> 
        <input name='tasktext' type='text' value='$task[tasktext]'>
        <input type='hidden' name='taskid' value='$task[id]'>
        <input type='submit' name='update' value='Update'>
        <input type='submit' name='delete' value='Delete'>
        </form>
        </li>";
        echo $listitem;
    }
}
//     $query = "SELECT * FROM tasks WHERE completed = 0";
//     $result = $conn->query($query)->fetchAll();
//     foreach ($result as $task) {
//         $listitem = "<li><form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF'])
//         . "'><input type='submit' name='completed' value='Complete'><input name='title' type='text' value='$task[title]'> 
//         <input name='tasktext' type='text' value='$task[tasktext]'>
//         <input type='hidden' name='taskid' value='$task[id]'>
//         <input type='submit' name='update' value='Update'>
//         <input type='submit' name='delete' value='Delete'>
//         </form>
//         </li>";
//         echo $listitem;
//     }