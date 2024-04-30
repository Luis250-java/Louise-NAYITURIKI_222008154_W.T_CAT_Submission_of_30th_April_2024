<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//start database connection here
$connection = new mysqli("localhost", "root", "", "students attendance database");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];
    $department_head = $_POST['department_head'];
    $location = $_POST['location'];
    //sql query for inserting data in departments table
    $sql = "INSERT INTO departments (department_id, department_name, department_head, location) 
            VALUES ('$department_id', '$department_name', '$department_head', '$location')";

    if ($connection->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>