<?php
include('databaseconnection.php');
// Check if admin_id is set
if (isset($_REQUEST['id'])) {
    $admin_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve admin details
    $stmt = $connection->prepare("SELECT * FROM admins WHERE admin_id = ?");
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $admin_id = $row['admin_id'];
        $username = $row['username'];
        $password = $row['password'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
    } else {
        echo "Admin not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="admin_id">admin_id:</label>
        <input type="number" name="admin_id" value="<?php echo isset($admin_id) ? $admin_id : ''; ?>" readonly>
        <br><br>
        <label for="username">username:</label>
        <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>" readonly>
        <br><br>
        <label for="password">password:</label>
        <input type="password" name="password" value="<?php echo isset($password) ? $password : ''; ?>" readonly>
        <br><br>
        <label for="first_name">first_name:</label>
        <input type="text" name="first_name" value="<?php echo isset($first_name) ? $first_name : ''; ?>" readonly>
        <br><br>
        <label for="last_name">last_name:</label>
        <input type="text" name="last_name" value="<?php echo isset($last_name) ? $last_name : ''; ?>" readonly>
        <br><br>
        <label for="email">email:</label>
        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" readonly>
        <br><br>
        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this admin record?')">
    </form>
</body>
</html>

<?php
if (isset($_POST['del'])) {
    // Retrieve admin_id for deletion
    $admin_id = $_POST['admin_id'];

    // Delete the admin record
    $stmt_delete_admin = $connection->prepare("DELETE FROM admins WHERE admin_id = ?");
    $stmt_delete_admin->bind_param("i", $admin_id);

    if ($stmt_delete_admin->execute()) {
        // Redirect to adminstable.php after successful deletion
        header('Location: adminstable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting admin: " . $stmt_delete_admin->error;
    }
}
?>