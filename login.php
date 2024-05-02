<?php
session_start(); 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Database connection parameters
    $servername = "localhost";
    $dbUsername = "root"; 
    $dbPassword = ""; 
    $dbName = "users";

    // Create connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to check user credentials
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $_SESSION['email'] = $email; // Store user's email in session
        header("Location: order.html"); // Redirect to a success page
        exit(); // exit after redirection
    } else {
        
        echo "Invalid email or password.";
    }

    // Close connection
    $conn->close();
}
?>



