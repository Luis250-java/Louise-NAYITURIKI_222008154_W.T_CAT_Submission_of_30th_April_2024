<?php
include('databaseconnection.php');
// Initialize variables
$course_id = $course_name = $course_code = $course_description = $teacher_id = "";

// Check if course_id is set
if (isset($_REQUEST['id'])) {
    $course_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve course details
    $stmt = $connection->prepare("SELECT * FROM courses WHERE course_id = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $course_id = $row['course_id'];
        $course_name = $row['course_name'];
        $course_code = $row['course_code'];
        $course_description = $row['course_description'];
        $teacher_id = $row['teacher_id'];
    } else {
        echo "Course not found.";
    }
}

// Handle form submission
if (isset($_POST['up'])) {
    // Retrieve updated values from course table
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $course_description = $_POST['course_description'];
    $teacher_id = $_POST['teacher_id'];

    // Update courses table in the database
    $stmt = $connection->prepare("UPDATE courses SET course_name=?, course_code=?, course_description=?, teacher_id=? WHERE course_id=?");

    $stmt->bind_param("ssssi", $course_name, $course_code, $course_description, $teacher_id, $course_id); // Corrected binding parameters

    if ($stmt->execute()) {
        // Redirect to coursetable.php after successful update
        header('Location: coursetable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating course: " . $stmt->error;
    }
}

// Handle delete action
if (isset($_POST['del'])) {
    // Retrieve course_id for deletion
    $course_id = $_POST['course_id'];

    // Delete the course record
    $stmt_delete_course = $connection->prepare("DELETE FROM courses WHERE course_id = ?");
    $stmt_delete_course->bind_param("i", $course_id);

    if ($stmt_delete_course->execute()) {
        // Redirect to coursetable.php after successful deletion
        header('Location: coursetable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting course: " . $stmt_delete_course->error;
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="course_id">course_id:</label>
        <input type="number" name="course_id" value="<?php echo isset($course_id) ? $course_id : ''; ?>" readonly>
        <br><br>
        <label for="course_name">course_name:</label>
        <input type="text" name="course_name" value="<?php echo isset($course_name) ? $course_name : ''; ?>">
        <br><br>
        <label for="course_code">course_code:</label>
        <input type="text" name="course_code" value="<?php echo isset($course_code) ? $course_code : ''; ?>">
        <br><br>
        <label for="course_description">course_description:</label>
        <input type="text" name="course_description" value="<?php echo isset($course_description) ? $course_description : ''; ?>">
        <br><br>
        <label for="teacher_id">teacher_id:</label>
        <input type="text" name="teacher_id" value="<?php echo isset($teacher_id) ? $teacher_id : ''; ?>">
        <br><br>
        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this course?')">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>