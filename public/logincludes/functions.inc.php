<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdrepeat) {
    $result;
    if ($pwd !== $pwdrepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function uidExists($conn, $username, $email) {
    $query = "SELECT * FROM users WHERE usersUid = :usersUid OR usersEmail = :usersEmail;";
    if (!$stmt = $conn->prepare($query)) {
        header("location: ../pages/signup.php?error=stmtfailed");
        exit();
    }
    $stmt->execute(["usersUid"=>$username, "usersEmail"=>$email]);
    if ($row = $stmt->fetch()) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}
function createUser($conn, $name, $email, $username, $pwd) {
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (:usersName, :usersEmail, :usersUid, :usersPwd);";
    if (!$stmt = $conn->prepare($query)) {
        header("location: ../pages/signup.php?error=stmtfailed");
        exit();
    }
    $stmt->execute(["usersName"=>$name, "usersEmail"=>$email, "usersUid"=>$username, "usersPwd"=>$hashedPwd]);
    header("location: ../pages/signup.php?error=none");
    exit();
}
function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $username, $pwd) {
    // since $username here either contains username or email, and uidexists 
    // looks if at least one of them exists, i can use same argument twice here
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../pages/login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../pages/login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}