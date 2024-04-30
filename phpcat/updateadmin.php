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
        <input type="number" name="admin_id" value="<?php echo isset($admin_id) ? $admin_id : ''; ?>">
        <br><br>
        <label for="username">username:</label>
        <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
        <br><br>
        <label for="password">password:</label>
        <input type="password" name="password" value="<?php echo isset($password) ? $password : ''; ?>">
        <br><br>
        <label for="first_name">first_name:</label>
        <input type="text" name="first_name" value="<?php echo isset($first_name) ? $first_name : ''; ?>">
        <br><br>
        <label for="last_name">last_name:</label>
        <input type="text" name="last_name" value="<?php echo isset($last_name) ? $last_name : ''; ?>">
        <br><br>
        <label for="email">email:</label>
        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="update" onclick="return confirm('Are you sure you want to update this admin?')">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $admin_id = $_POST['admin_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Update admin in the database
    $stmt = $connection->prepare("UPDATE admins SET username=?, password=?, first_name=?, last_name=?, email=? WHERE admin_id=?");
    $stmt->bind_param("sssssi", $username, $password, $first_name, $last_name, $email, $admin_id);

    if ($stmt->execute()) {
        // Redirect to adminstable.php after successful update
        header('Location: adminstable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating admin: " . $stmt->error;
    }
}
?>