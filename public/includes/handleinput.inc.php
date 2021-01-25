<?php
include_once __DIR__."/../db/connect.inc.php";
include_once "../header.php";

$title = $_GET['title'];
$tasktext = $_GET['tasktext'];
$userid = $_SESSION['userid'];

$query = "INSERT INTO tasks (title, tasktext, completed, userid) VALUES (:title, :tasktext, false, :userid);";
$stmnt = $conn->prepare($query);
if ($stmnt->execute(["title"=>$title, "tasktext"=>$tasktext, "userid"=>$userid])) {
    echo "Your task uploaded successfully to cat heaven. Click \"Home\".";
} else {
    echo "Aw, something went wrong! Please contact the kitten in charge.";
};