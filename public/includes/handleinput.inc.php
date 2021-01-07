<?php
//include_once "../db/connect.php";

$title = $_POST['title'];
$tasktext = $_POST['tasktext'];

$query = "INSERT INTO tasks (title, tasktext, completed) VALUES (:title, :tasktext, false);";
$stmnt = $conn->prepare($query);
if ($stmnt->execute(["title"=>$title, "tasktext"=>$tasktext])) {
    echo "Your task uploaded successfully to cat heaven.";
} else {
    echo "Aw, something went wrong! Please contact the kitten in charge.";
};