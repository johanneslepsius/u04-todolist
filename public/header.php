<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\style\style.css">
    <title>To Do-List</title>
</head>
<nav>
<div class="wrapper">
<ul>
<li><a href="\index.php">Home</a></li>
<?php
if (isset($_SESSION["useruid"])) {
    echo "<li><a href='\logincludes\logout.inc.php'>Log out</a></li>";
} else {
    echo "<li><a href='\pages\signup.php'>Sign Up</a></li>";
    echo "<li><a href='\pages\login.php'>Login</a></li>";
}
?>
</div>
</nav>
<body>
    