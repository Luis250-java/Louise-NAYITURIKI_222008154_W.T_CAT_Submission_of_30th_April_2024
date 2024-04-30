<?php
// Database connection parameters
$servername = "localhost"; // Change this to your server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "Students attendance database"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$attendance_id = $_POST['attendance_id'];
$student_id = $_POST['student_id'];
$student_name = $_POST['student_name'];
$course_id = $_POST['course_id'];
$attendance_date = $_POST['attendance_date'];
$status = $_POST['status'];

// Prepare SQL statement to insert data into the attendance table
$sql = "INSERT INTO attendance (attendance_id, student_id, student_name, course_id, attendance_date, status) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ssssss", $attendance_id, $student_id, $student_name, $course_id, $attendance_date, $status);

// Execute the statement
if ($stmt->execute()) {
    echo "Attendance record inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>