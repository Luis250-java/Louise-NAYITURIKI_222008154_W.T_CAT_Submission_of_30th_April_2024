<?php
include('databaseconnection.php');
// Check if teacher_id is set
if (isset($_REQUEST['id'])) {
    $teacher_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve teacher details
    $stmt = $connection->prepare("SELECT * FROM teachers WHERE teacher_id = ?");
    $stmt->bind_param("i", $teacher_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $teacher_id = $row['teacher_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $date_of_birth = $row['date_of_birth'];
        $email = $row['email'];
        $teaching_experience = $row['teaching_experience'];
        $subject_taught = $row['subject_taught'];
    } else {
        echo "Teacher not found.";
    }
}

// Handle form submission for delete
if (isset($_POST['del'])) {
    // Retrieve teacher_id for deletion
    $teacher_id = $_POST['teacher_id'];

    // Delete the teacher record
    $stmt_delete_teacher = $connection->prepare("DELETE FROM teachers WHERE teacher_id = ?");
    $stmt_delete_teacher->bind_param("i", $teacher_id);

    if ($stmt_delete_teacher->execute()) {
        // Redirect to teacherstable.php after successful deletion
        header('Location: teacherstable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting teacher: " . $stmt_delete_teacher->error;
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="teacher_id">Teacher ID:</label>
        <input type="number" name="teacher_id" value="<?php echo isset($teacher_id) ? $teacher_id : ''; ?>" readonly><br><br>
        
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?php echo isset($first_name) ? $first_name : ''; ?>"><br><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?php echo isset($last_name) ? $last_name : ''; ?>"><br><br>
        
        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" value="<?php echo isset($date_of_birth) ? $date_of_birth : ''; ?>"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>"><br><br>
        
        <label for="teaching_experience">Teaching Experience:</label>
        <input type="number" name="teaching_experience" value="<?php echo isset($teaching_experience) ? $teaching_experience : ''; ?>"><br><br>
        
        <label for="subject_taught">Subject Taught:</label>
        <input type="text" name="subject_taught" value="<?php echo isset($subject_taught) ? $subject_taught : ''; ?>"><br><br>
        
        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this teacher?')">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>
