<?php
// Connection details
$host = "localhost";
$user = "root";
$pass = "";
$database = "employee_attendance";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if user_id is set
if(isset($_REQUEST['employee_code'])) {
    $user_id = $_REQUEST['employee_code'];
    
    // Prepare and execute SELECT statement to retrieve user_id details
    $stmt = $connection->prepare("SELECT * FROM employee WHERE employee_code = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $i = $row['employee_code'];
        $a = $row['firstname'];
        $x = $row['lastname'];
        $z = $row['username'];
        $b = $row['email'];
        $c = $row['password'];
        $d = $row['telephone'];
        $y = $row['hireddate'];
       
    } else {
        echo "users not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="firstname">firstname:</label>
        <input type="text" name="firstname" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>
        <label for="lastname">lastname:</label>
        <input type="text" name="lastname" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="username">username:</label>
        <input type="text" name="username" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="email">email:</label>
        <input type="text" name="email" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="password">password:</label>
        <input type="text" name="password" value="<?php echo isset($c) ? $c : ''; ?>">
        <label for="telephone">telephone:</label>
        <input type="text" name="telephone" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>
        <br><br>
        <label for="role">hireddate:</label>
        <input type="date" name="hireddate" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>
       
        <input type="submit" name="up" value="Update">
        <input type="reset" name="cn" value="cancel">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $hireddate = $_POST['hireddate'];

    // Update the users in the database
    $stmt = $connection->prepare("UPDATE employee SET firstname=?,lastname=?,username=?,email=?,password=?,telephone=?,hireddate=? WHERE employee_code=?");

    $stmt->bind_param("ssssssss",$firstname,$lastname, $username,$email, $password, $telephone,$hireddate,$user_id);
    
    if ($stmt->execute()) {
        // Redirect to users.php after successful update
        header('Location: employeetable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating users: " . $stmt->error;
    }
}
?>
