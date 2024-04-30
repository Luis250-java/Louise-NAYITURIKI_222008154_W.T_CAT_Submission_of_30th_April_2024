<?php
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
        <input type="number" name="department_id" value="<?php echo isset($department_id) ? $department_id : ''; ?>">
        <br><br>
        <label for="department_name">department_name:</label>
        <input type="text" name="department_name" value="<?php echo isset($department_name) ? $department_name : ''; ?>">
        <br><br>
        <label for="department_head">department_head:</label>
        <input type="text" name="department_head" value="<?php echo isset($department_head) ? $department_head : ''; ?>">
        <br><br>
        <label for="location">location:</label>
        <input type="text" name="location" value="<?php echo isset($location) ? $location : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="update" onclick="return confirm('Are you sure you want to update this department?')">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from departments table
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];
    $department_head = $_POST['department_head'];
    $location = $_POST['location'];

    // Update the department in the database
    $stmt = $connection->prepare("UPDATE departments SET department_name=?, department_head=?, location=? WHERE department_id=?");
    $stmt->bind_param("sssi", $department_name, $department_head, $location, $department_id);

    if ($stmt->execute()) {
        // Redirect to departmenttable.php after successful update
        header('Location: departmenttable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating department: " . $stmt->error;
    }
}
?>