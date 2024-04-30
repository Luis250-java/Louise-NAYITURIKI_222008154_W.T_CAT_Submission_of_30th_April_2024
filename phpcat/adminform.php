<?php
include('databaseconnection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST['admin_id'];
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    //sql query for inserting data in admins table
    $sql = "INSERT INTO admins (admin_id, username, password, first_name, last_name, email) 
            VALUES ('$admin_id', '$username', '$password', '$first_name', '$last_name', '$email')";

    if ($connection->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>