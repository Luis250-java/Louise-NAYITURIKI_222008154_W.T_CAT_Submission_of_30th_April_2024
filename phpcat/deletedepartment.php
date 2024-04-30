<?php
// Connection details
include('databaseconnection.php');

// Check if department_id is set
if (isset($_REQUEST['id'])) {
    $department_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve department details
    $stmt = $connection->prepare("SELECT * FROM departments WHERE department_id = ?");
    $stmt->bind_param("i", $department_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $department_id = $row['department_id'];
        $department_name = $row['department_name'];
        $department_head = $row['department_head'];
        $location = $row['location'];
    } else {
        echo "Department not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="department_id">department_id:</label>
        <input type="number" name="department_id" value="<?php echo isset($department_id) ? $department_id : ''; ?>" readonly>
        <br><br>
        <label for="department_name">department_name:</label>
        <input type="text" name="department_name" value="<?php echo isset($department_name) ? $department_name : ''; ?>" readonly>
        <br><br>
        <label for="department_head">department_head:</label>
        <input type="text" name="department_head" value="<?php echo isset($department_head) ? $department_head : ''; ?>" readonly>
        <br><br>
        <label for="location">location:</label>
        <input type="text" name="location" value="<?php echo isset($location) ? $location : ''; ?>" readonly>
        <br><br>
        <input type="submit" name="up" value="Update">
        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this department?')">
    </form>
</body>
</html>

<?php
if (isset($_POST['del'])) {
    // Retrieve department_id for deletion
    $department_id = $_POST['department_id'];

    // Delete the department record
    $stmt_delete_department = $connection->prepare("DELETE FROM departments WHERE department_id = ?");
    $stmt_delete_department->bind_param("i", $department_id);

    if ($stmt_delete_department->execute()) {
        // Redirect to departmenttable.php after successful deletion
        header('Location: departmenttable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting department: " . $stmt_delete_department->error;
    }
}
?>