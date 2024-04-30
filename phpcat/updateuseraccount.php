<?php
// Connection details
include('databaseconnection.php');

// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve user account details
    $stmt = $connection->prepare("SELECT * FROM useraccounts WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
        $registration_date = $row['registration_date'];
        $role = $row['role'];
    } else {
        echo "User account not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="user_id">user_id:</label>
        <input type="number" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <br><br>
        <label for="username">username:</label>
        <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
        <br><br>
        <label for="email">email:</label>
        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
        <br><br>
        <label for="password">password:</label>
        <input type="password" name="password" value="<?php echo isset($password) ? $password : ''; ?>">
        <br><br>
        <label for="registration_date">registration_date:</label>
        <input type="date" name="registration_date" value="<?php echo isset($registration_date) ? $registration_date : ''; ?>">
        <br><br>
        <label for="role">role:</label>
        <input type="text" name="role" value="<?php echo isset($role) ? $role : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="update" onclick="return confirm('Are you sure you want to update this useraccount?')">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from useraccounts table
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $registration_date = $_POST['registration_date'];
    $role = $_POST['role'];

    // Update useraccounts table in the database
    $stmt = $connection->prepare("UPDATE useraccounts SET username=?, email=?, password=?, registration_date=?, role=? WHERE user_id=?");

    $stmt->bind_param("sssssi", $username, $email, $password, $registration_date, $role, $user_id); // Corrected binding parameters

    if ($stmt->execute()) {
        // Redirect to useraccountstable.php after successful update
        header('Location: useraccountstable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating user account: " . $stmt->error;
    }
}
?>