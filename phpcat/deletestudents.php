<?php
include('databaseconnection.php');
// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve user details
    $stmt = $connection->prepare("SELECT * FROM students WHERE student_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['student_id'];
        $x = $row['first_name'];
        $z = $row['last_name'];
        $b = $row['reg_number']; 
        $c = $row['date_of_birth'];
        $b = $row['email'];
        $b = $row['Address'];
        $b = $row['Class_section'];
    } else {
        echo "User not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="student_id">student_id:</label>
        <input type="number" name="student_id" value="<?php echo isset($a) ? $a : ''; ?>" readonly>
        <br><br>
        <label for="first_name">first_name:</label>
        <input type="text" name="first_name" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="last_name">last_name:</label>
        <input type="text" name="last_name" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="reg_number">reg_number:</label>
        <input type="number" name="reg_number" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="workinghours">date_of_birth:</label>
        <input type="date" name="date_of_birth" value="<?php echo isset($c) ? $c : ''; ?>">

        <label for="email">email:</label>
        <input type="email" name="email" value="<?php echo isset($b) ? $b : ''; ?>">

        <label for="Address">Address:</label>
        <input type="text" name="Address" value="<?php echo isset($b) ? $b : ''; ?>">

        <label for="Class_section">Class_section:</label>
        <input type="text" name="Class_section" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this student record?')">
    </form>
</body>
</html>

<?php
if (isset($_POST['del'])) {
    // Retrieve student_id for deletion
    $student_id = $_POST['student_id'];

    // Prepare and execute DELETE statement to delete the student record
    $stmt = $connection->prepare("DELETE FROM students WHERE student_id = ?");
    $stmt->bind_param("i", $student_id);

    if ($stmt->execute()) {
        // Redirect to studenttable.php after successful deletion
        header('Location: studenttable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting user: " . $stmt->error;
    }
}
?>