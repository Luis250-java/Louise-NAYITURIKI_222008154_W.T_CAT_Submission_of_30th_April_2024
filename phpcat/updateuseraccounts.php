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

// Check if class_id is set
if (isset($_REQUEST['id'])) {
    $class_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve class details
    $stmt = $connection->prepare("SELECT * FROM useraccounts WHERE user_id = ?");
    $stmt->bind_param("i", $class_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
        $registration_date = $row['registration_date'];
        $role = $row['role'];
    } else {
        echo "Class not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="user_id">user_id:</label>
        <input type="number" name="user_id" value="<?php echo isset($class_id) ? $class_id : ''; ?>">
        <br><br>
        <label for="username">username:</label>
        <input type="text" name="username" value="<?php echo isset($class_name) ? $class_name : ''; ?>">
        <br><br>
        <label for="email">email:</label>
        <input type="email" name="email" value="<?php echo isset($course_id) ? $course_id : ''; ?>">
        <br><br>
        <label for="password">password:</label>
        <input type="password" name="password" value="<?php echo isset($teacher_id) ? $teacher_id : ''; ?>">
        <br><br>
        <label for="registration_date">registration_date:</label>
        <input type="date" name="registration_date" value="<?php echo isset($class_section) ? $class_section : ''; ?>">
        <br><br>
        <label for="role">role:</label>
        <input type="text" name="role" value="<?php echo isset($class_section) ? $class_section : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from classes table
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['course_id'];
    $teacher_id = $_POST['teacher_id'];
    $class_section = $_POST['class_section'];

    // Update class table in the database
    $stmt = $connection->prepare("UPDATE useraccounts SET username=?, email=?, password=?, teacher_id=? WHERE class_section=?");

    $stmt->bind_param("ssssi", $user_id, $username, $email, $password, $teacher_id, $calss_section); // Corrected binding parameters

    if ($stmt->execute()) {
        // Redirect to classestable.php after successful update
        header('Location: useraccountstable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating class: " . $stmt->error;
    }
}
?>