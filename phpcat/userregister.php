<?php
include('databaseconnection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $registration_date = date('Y-m-d'); // Current date
    $role= $_POST['role'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind parameters to prevent SQL injection
    $sql = "INSERT INTO useraccounts (username, email, password, registration_date, role) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssss", $username, $email, $hashed_password, $registration_date, $role);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$connection->close();
?>