
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $registration_date = $_POST['registration_date'];
    $role= $_POST['role'];

    // Validate the data
    if (empty($user_id) || empty($username) || empty($email) || empty($password) || empty($registration_date) || empty($role)) {
        echo "All fields are required.";
    } else {
        // Connection with  my database 
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "Students attendance database";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert user data into the database
           $sql = "INSERT INTO useraccounts (user_id, username, email, password, registration_date, role) 
            VALUES ('$user_id', '$username', '$email', '$password', '$registration_date', '$role')";

        if ($conn->query($sql) === TRUE) {
            echo "Sign up successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
}
?>