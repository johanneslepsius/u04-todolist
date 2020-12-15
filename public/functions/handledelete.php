<?php
$taskid = $_POST['taskid'];
$query = "DELETE FROM tasks WHERE id = :taskid";

$stmnt = $conn->prepare($query);

$stmnt->execute(["taskid"=>$taskid]);

var_dump($_POST['taskid']);