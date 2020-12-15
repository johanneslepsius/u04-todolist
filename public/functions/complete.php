<?php
$id = $_POST['taskid'];
$query = "UPDATE tasks SET completed = true WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->execute(["id"=>$id]);