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