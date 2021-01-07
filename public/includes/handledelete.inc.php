<?php
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