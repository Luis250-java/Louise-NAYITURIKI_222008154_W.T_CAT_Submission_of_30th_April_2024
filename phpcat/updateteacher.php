<?php
// Connection details
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

?>

<html>
<body>
    <form method="POST">
        <label for="teacher_id">teacher_id:</label>
        <input type="number" name="teacher_id" value="<?php echo isset($teacher_id) ? $teacher_id : ''; ?>">
        <br><br>
        <label for="first_name">first_name:</label>
        <input type="text" name="first_name" value="<?php echo isset($first_name) ? $first_name : ''; ?>">
        <br><br>
        <label for="last_name">last_name:</label>
        <input type="text" name="last_name" value="<?php echo isset($last_name) ? $last_name : ''; ?>">
        <br><br>
        <label for="date_of_birth">date_of_birth:</label>
        <input type="date" name="date_of_birth" value="<?php echo isset($date_of_birth) ? $date_of_birth : ''; ?>">
        <br><br>
        <label for="email">email:</label>
        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
        <br><br>
        <label for="teaching_experience">teaching_experience:</label>
        <input type="number" name="teaching_experience" value="<?php echo isset($teaching_experience) ? $teaching_experience : ''; ?>">
        <br><br>
        <label for="subject_taught">subject_taught:</label>
        <input type="text" name="subject_taught" value="<?php echo isset($subject_taught) ? $subject_taught : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="update" onclick="return confirm('Are you sure you want to update this dteacher?')">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from teachers table
    $teacher_id = $_POST['teacher_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $teaching_experience = $_POST['teaching_experience'];
    $subject_taught = $_POST['subject_taught'];

    // Update the teacher in the database
    $stmt = $connection->prepare("UPDATE teachers SET first_name=?, last_name=?, date_of_birth=?, email=?, teaching_experience=?, subject_taught=? WHERE teacher_id=?");
    $stmt->bind_param("ssssisi", $first_name, $last_name, $date_of_birth, $email, $teaching_experience, $subject_taught, $teacher_id);

    if ($stmt->execute()) {
        // Redirect to teacherstable.php after successful update
        header('Location: teacherstable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating teacher: " . $stmt->error;
    }
}
?>