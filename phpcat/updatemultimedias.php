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

    // Prepare and execute SELECT statement to retrieve user account details
    $stmt = $connection->prepare("SELECT * FROM useraccounts WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $mid_id = $row['mid_id'];
        $user_id = $row['user_id'];
        $media_type = $row['media_type'];
        $location= $row['location'];
        $upload_date = $row['upload_date'];
    } else {
        echo "media not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="mid_id">mid_id:</label>
        <input type="number" name="mid_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <br><br>
        <label for="user_id">user_id:</label>
        <input type="number" name="user_id" value="<?php echo isset($username) ? $username : ''; ?>">
        <br><br>
        <label for="media_type">media_type:</label>
        <input type="text" name="media_type" value="<?php echo isset($email) ? $email : ''; ?>">
        <br><br>
        <label for="location">location:</label>
        <input type="text" name="text" value="<?php echo isset($password) ? $password : ''; ?>">
        <br><br>
        <label for="upload_date">upload_date:</label>
        <input type="date" name="upload_date" value="<?php echo isset($registration_date) ? $registration_date : ''; ?>">
        <input type="submit" name="up" value="Update">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from useraccounts table
    $mid_id = $_POST['mid_id'];
    $user_id = $_POST['user_id'];
    $media_type = $_POST['media_type'];
    $location = $_POST['location'];
    $upload_date = $_POST['upload_date'];

    // Update useraccounts table in the database
    $stmt = $connection->prepare("UPDATE multimedias SET user_id=?, media_type=?, location=?, upload_date=?, role=? WHERE mid_id=?");

    $stmt->bind_param("sssssi", $mid_id, $user_id, $media_type, $location, $upload_date, $role); // Corrected binding parameters

    if ($stmt->execute()) {
        // Redirect to useraccountstable.php after successful update
        header('Location: multimediastable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating media account: " . $stmt->error;
    }
}
?>