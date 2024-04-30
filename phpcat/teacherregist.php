<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start database connection here
$connection = new mysqli("localhost", "root", "", "students attendance database");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_id = $_POST['teacher_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $teaching_experiment = $_POST['teaching_experiment'];
    $subject_taught = $_POST['subject_taught'];

    // SQL query for inserting data into teachers table
    $sql = "INSERT INTO teachers (teacher_id, first_name, last_name, date_of_birth, email, teaching_experiment, subject_taught) 
            VALUES ('$teacher_id', '$first_name', '$last_name', '$date_of_birth', '$email', '$teaching_experiment', '$subject_taught')";

    if ($connection->query($sql) === TRUE) {
        echo "Registration successful!";
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>