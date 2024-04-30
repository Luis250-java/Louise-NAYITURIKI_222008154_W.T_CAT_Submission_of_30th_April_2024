<?php
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

?>

<html>
<body>
    <form method="POST">
        <label for="class_id">class_id:</label>
        <input type="number" name="class_id" value="<?php echo isset($class_id) ? $class_id : ''; ?>">
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
        <input type="submit" name="up" value="update" onclick="return confirm('Are you sure you want to update this class?')">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from classes table
    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    $course_id = $_POST['course_id'];
    $teacher_id = $_POST['teacher_id'];
    $class_section = $_POST['class_section'];

    // Update class table in the database
    $stmt = $connection->prepare("UPDATE classes SET class_name=?, course_id=?, teacher_id=?, class_section=? WHERE class_id=?");

    $stmt->bind_param("ssssi", $class_name, $course_id, $teacher_id, $class_section, $class_id); // Corrected binding parameters

    if ($stmt->execute()) {
        // Redirect to classestable.php after successful update
        header('Location: classestable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating class: " . $stmt->error;
    }
}
?>