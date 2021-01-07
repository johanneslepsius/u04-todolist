<?php
if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    include_once '../db/connect.inc.php';
    include_once '../logincludes/functions.inc.php';
        
    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../pages/login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);

} else {
        header("location: ../pages/login.php");
        exit();
    }