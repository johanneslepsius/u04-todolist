<?php
$taskid = $_POST['taskid'];
$query = "DELETE FROM tasks WHERE id = :taskid";

$stmnt = $conn->prepare($query);

try {
$stmnt->execute(["taskid"=>$taskid]);
} catch (Exception $e) {
    echo $e->getMessage();
}
