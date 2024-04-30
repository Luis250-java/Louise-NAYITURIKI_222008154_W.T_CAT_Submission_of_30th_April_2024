<?php
// Connection details
$host = "localhost";
$user = "root";
$pass = "";
$database = "Students attendance database";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve user details
    $stmt = $connection->prepare("SELECT * FROM attendance WHERE attendance_id = ?");
    $stmt->bind_param("i", $attendance_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['attendance_id'];
        $a = $row['student_id'];
        $a = $row['student_name'];
        $x = $row['course_id'];
        $z = $row['attendance_date'];
        $b = $row['status'];
    } else {
        echo "User not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="attendance_id">attendance_id:</label>
        <input type="number" name="attendance_id" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>
        <label for="student_id">student_id:</label>
        <input type="number" name="student_id" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>
        <label for="student_name">student_name:</label>
        <input type="text" name="student_name" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>
        <label for="course_id">course_id:</label>
        <input type="number" name="course_id" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="attendance_date">attendance_date:</label>
        <input type="date" name="attendance_date" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="status">status:</label>
        <input type="text" name="status" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="delete">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve deleted values from attendance table
    $attendance_id = $_POST['attendance_id'];
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $course_id = $_POST['course_id'];
    $attendance_date = $_POST['attendance_date'];
    $status = $_POST['status'];
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM attendance WHERE attendance_id=?");
    $stmt->bind_param("i", $student_id);
    
    if ($stmt->execute()) {
        // Redirect to attendance.php after successful deletion
        header('location: attendancetable.php?msg=Data deleted successfully');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Attendance id is not set.";
}

?>
