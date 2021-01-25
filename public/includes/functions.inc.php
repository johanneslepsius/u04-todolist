<?php
function complete(PDO $conn) {
$id = $_POST['taskid'];

$firstquery = "SELECT completed FROM tasks WHERE id = :id";
$firststmt = $conn->prepare($firstquery);
$firststmt->execute(["id"=>$id]);
$firstcompleted = $firststmt->fetch();
$changedcomp = !$firstcompleted["completed"];

$query = "UPDATE tasks SET completed = :completed WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":completed", $changedcomp, PDO::PARAM_BOOL);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->execute();
// $id = $_POST['taskid'];
// $query = "UPDATE tasks SET completed = :completed WHERE id = :id";
// $stmt = $conn->prepare($query);
// $stmt->bindParam(":completed", $completed, PDO::PARAM_BOOL);
// $stmt->bindParam(":id", $id, PDO::PARAM_INT);
// $stmt->execute();
}

function delete($conn) {
$taskid = $_POST['taskid'];
$query = "DELETE FROM tasks WHERE id = :taskid";

$stmnt = $conn->prepare($query);

try {
$stmnt->execute(["taskid"=>$taskid]);
} catch (Exception $e) {
    echo $e->getMessage();
}
}

function deleteAllComp($conn) {
$query = "DELETE FROM tasks WHERE completed = true";
$result = $conn->query($query);
}

function update($conn) {
$title = $_POST['title'];
$tasktext = $_POST['tasktext'];
$id = $_POST['taskid'];

$query = "UPDATE tasks SET title = :title, tasktext = :tasktext WHERE id = :id";
$stmt = $conn->prepare($query);
if ($stmt->execute(["title"=>$title, "tasktext"=>$tasktext, "id"=>$id])) {
    echo "Your task uploaded successfully to cat heaven.";
} else {
    echo "Aw, something went wrong! Please contact the kitten in charge.";
}
}

function printcomptask(PDO $conn, $completed, $userid){

    $query = "SELECT * FROM tasks WHERE userid = :userid AND completed = :completed";
    $stmt = $conn->prepare($query);
    $stmt->execute(["userid"=>$userid, "completed"=>$completed]);
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

function printtask(PDO $conn, $completed, $userid){

    $query = "SELECT * FROM tasks WHERE userid = :userid AND completed = :completed";
    $stmt = $conn->prepare($query);
    $stmt->execute(["userid"=>$userid, "completed"=>$completed]);
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