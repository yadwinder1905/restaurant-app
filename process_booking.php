<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date = $_POST["date"];
    $time = $_POST["time"];
    $party = $_POST["party"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookings";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO bookings (date, time, party_size, name, email, phone, message)
            VALUES ('$date', '$time', '$party', '$name', '$email', '$phone', '$message')";

   
    if ($conn->query($sql) === TRUE) {
        
        header("Location: table_booking.html");
        exit; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>



