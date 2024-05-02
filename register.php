<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data{

    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    // Database connection parameters
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "users";

    
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (first_name, last_name, username, email, password)
            VALUES ('$firstName', '$lastName', '$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
    
        header("Location: login.html");
        exit; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


