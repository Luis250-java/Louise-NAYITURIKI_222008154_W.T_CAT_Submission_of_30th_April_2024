<?php
include('databaseconnection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $course_description = $_POST['course_description'];
    $teacher_id = $_POST['teacher_id'];
    //sql query for inserting data in course table
    $sql = "INSERT INTO courses (course_id, course_name, course_code, course_description, teacher_id) 
            VALUES ('$course_id', '$course_name', '$course_code', '$course_description', '$teacher_id')";

    if ($connection->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>