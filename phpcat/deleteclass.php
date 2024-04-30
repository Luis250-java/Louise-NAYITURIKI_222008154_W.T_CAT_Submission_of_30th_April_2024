<?php
// Connection details
include('databaseconnection.php');

// Check if class_id is set
if (isset($_REQUEST['id'])) {
    $class_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve class details
    $stmt = $connection->prepare("SELECT * FROM classes WHERE class_id = ?");
    $stmt->bind_param("i", $class_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $class_id = $row['class_id'];
        $class_name = $row['class_name'];
        $course_id = $row['course_id'];
        $teacher_id = $row['teacher_id'];
        $class_section = $row['class_section'];
    } else {
        echo "Class not found.";
    }
}

// Handle form submission for delete
if (isset($_POST['del'])) {
    // Retrieve class_id for deletion
    $class_id = $_POST['class_id'];

    // Delete the class record
    $stmt_delete_class = $connection->prepare("DELETE FROM classes WHERE class_id = ?");
    $stmt_delete_class->bind_param("i", $class_id);

    if ($stmt_delete_class->execute()) {
        // Redirect to classestable.php after successful deletion
        header('Location: classestable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting class: " . $stmt_delete_class->error;
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="class_id">class_id:</label>
        <input type="number" name="class_id" value="<?php echo isset($class_id) ? $class_id : ''; ?>" readonly>
        <br><br>
        <label for="class_name">class_name:</label>
        <input type="text" name="class_name" value="<?php echo isset($class_name) ? $class_name : ''; ?>">
        <br><br>
        <label for="course_id">course_id:</label>
        <input type="number" name="course_id" value="<?php echo isset($course_id) ? $course_id : ''; ?>">
        <br><br>
        <label for="teacher_id">teacher_id:</label>
        <input type="number" name="teacher_id" value="<?php echo isset($teacher_id) ? $teacher_id : ''; ?>">
        <br><br>
        <label for="class_section">class_section:</label>
        <input type="text" name="class_section" value="<?php echo isset($class_section) ? $class_section : ''; ?>">
        <br><br>
        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this class?')">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>