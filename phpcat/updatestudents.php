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
        <input type="number" name="student_id" value="<?php echo isset($a) ? $a : ''; ?>">
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
        <input type="email" name="date_of_birth" value="<?php echo isset($c) ? $c : ''; ?>">

        <label for="Address">Address:</label>
        <input type="text" name="Address" value="<?php echo isset($c) ? $c : ''; ?>">

        <label for="Class_section">Class_section:</label>
        <input type="text" name="Class_section" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from students
   $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $reg_number = $_POST['reg_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $address = $_POST['Address'];
    $class_section = $_POST['Class_section'];
    // Update the user in the database
    $stmt = $connection->prepare("UPDATE students SET first_name=?, last_name=?, reg_number=?, date_of_birth=?, email=?, Address=?, Class_section=? WHERE student_id=?");

    $stmt->bind_param("sssssssi",$student_id, $first_name, $last_name, $reg_number, $date_of_birth, $email, $Address, $Class_section); // Corrected binding parameters

    if ($stmt->execute()) {
        // Redirect to studenttable.php after successful update
        header('Location: studenttable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating user: " . $stmt->error;
    }
}
?>
