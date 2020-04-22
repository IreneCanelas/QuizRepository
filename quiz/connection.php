<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizwebsite";
$email = "email";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $email);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>