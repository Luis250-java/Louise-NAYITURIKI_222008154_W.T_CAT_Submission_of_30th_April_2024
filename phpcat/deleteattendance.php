<?php
// Connection details
include('databaseconnection.php');

// Check if attendance_id is set
if (isset($_REQUEST['id'])) {
    $attendance_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve attendance details
    $stmt = $connection->prepare("SELECT * FROM attendance WHERE attendance_id = ?");
    $stmt->bind_param("i", $attendance_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $attendance_id = $row['attendance_id'];
        $student_id = $row['student_id'];
        $student_name = $row['student_name'];
        $course_id = $row['course_id'];
        $attendance_date = $row['attendance_date'];
        $status = $row['status'];
    } else {
        echo "Attendance record not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="attendance_id">attendance_id:</label>
        <input type="number" name="attendance_id" value="<?php echo isset($attendance_id) ? $attendance_id : ''; ?>" readonly>
        <br><br>
        <label for="student_id">student_id:</label>
        <input type="number" name="student_id" value="<?php echo isset($student_id) ? $student_id : ''; ?>" readonly>
        <br><br>
        <label for="student_name">student_name:</label>
        <input type="text" name="student_name" value="<?php echo isset($student_name) ? $student_name : ''; ?>" readonly>
        <br><br>
        <label for="course_id">course_id:</label>
        <input type="number" name="course_id" value="<?php echo isset($course_id) ? $course_id : ''; ?>" readonly>
        <br><br>
        <label for="attendance_date">attendance_date:</label>
        <input type="date" name="attendance_date" value="<?php echo isset($attendance_date) ? $attendance_date : ''; ?>" readonly>
        <br><br>
        <label for="status">status:</label>
        <input type="text" name="status" value="<?php echo isset($status) ? $status : ''; ?>" readonly>
        <br><br>
        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this attendance record?')">
    </form>
</body>
</html>

<?php
if (isset($_POST['del'])) {
    // Retrieve attendance_id for deletion
    $attendance_id = $_POST['attendance_id'];

    // Delete the attendance record
    $stmt_delete_attendance = $connection->prepare("DELETE FROM attendance WHERE attendance_id = ?");
    $stmt_delete_attendance->bind_param("i", $attendance_id);

    if ($stmt_delete_attendance->execute()) {
        // Redirect to attendancetable.php after successful deletion
        header('Location: attendancetable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting attendance record: " . $stmt_delete_attendance->error;
    }
}
?>