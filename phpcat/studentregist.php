<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start database connection here
$connection = new mysqli("localhost", "root", "", "students attendance database");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $reg_number = $_POST['reg_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $class_section = $_POST['class_section'];

    // SQL query for inserting data into students table
    $sql = "INSERT INTO Students (student_id, first_name, last_name, reg_number, date_of_birth, email, address, class_section) 
            VALUES ('$student_id', '$first_name', '$last_name', '$reg_number', '$date_of_birth', '$email', '$address', '$class_section')";

    if ($connection->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>