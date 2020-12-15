<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "todolist";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Yay, you´re connected!";
    } catch(PDOException $e) {
        echo "Cat toy balls! The connection effed up." . $e->getMessage();
    }