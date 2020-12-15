<?php
$title = $_POST['title'];
$tasktext = $_POST['tasktext'];
$id = $_POST['taskid'];

$query = "UPDATE tasks SET title = :title, tasktext = :tasktext WHERE id = $id;";
$stmt = $conn->prepare($query);
var_dump($stmt);
if ($stmt->execute(["title"=>$title, "tasktext"=>$tasktext])) {
    echo "Your task uploaded successfully to cat heaven.";
} else {
    echo "Aw, something went wrong! Please contact the kitten in charge.";
};