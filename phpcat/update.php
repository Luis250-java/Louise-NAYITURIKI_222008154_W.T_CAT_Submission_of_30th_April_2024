<?php
$connection = new mysqli("localhost", "root", "", "students attendance database");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the form
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

// SQL query to update data in the database
$sql = "UPDATE your_table SET name='$name', email='$email' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>