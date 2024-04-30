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

// Handle form submission for delete
if (isset($_POST['del'])) {
    // Retrieve user_id for deletion
    $user_id = $_POST['user_id'];

    // Delete the user account record
    $stmt_delete_user = $connection->prepare("DELETE FROM useraccounts WHERE user_id = ?");
    $stmt_delete_user->bind_param("i", $user_id);

    if ($stmt_delete_user->execute()) {
        // Redirect to useraccountstable.php after successful deletion
        header('Location: useraccountstable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting user account: " . $stmt_delete_user->error;
    }
}
?>

<html>
<body>
    <form method="POST">
        <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this user account?')">
    </form>
</body>
</html>