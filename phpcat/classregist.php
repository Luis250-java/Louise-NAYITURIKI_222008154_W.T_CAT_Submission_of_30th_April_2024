<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//start database connection here
$connection = new mysqli("localhost", "root", "", "students attendance database");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    $course_id = $_POST['course_id'];
    $teacher_id = $_POST['teacher_id'];
    $class_section= $_POST['class_section'];

    //sql query for inserting data in classes table
    $sql = "INSERT INTO classes (class_id, class_name, course_id, teacher_id, class_section) 
            VALUES ('$class_id', '$class_name', '$course_id', '$teacher_id', '$class_section')";

    if ($connection->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>