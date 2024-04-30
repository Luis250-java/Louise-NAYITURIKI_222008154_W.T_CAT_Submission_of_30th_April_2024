<?php
// Connection details
include('databaseconnection.php');

// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve multimedia details
    $stmt = $connection->prepare("SELECT * FROM multimedias WHERE mid_id = ?");
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
        echo "Media not found.";
    }
}

// Handle form submission
if (isset($_POST['up'])) {
    // Retrieve updated values from multimedia table
    $mid_id = $_POST['mid_id'];
    $user_id = $_POST['user_id'];
    $media_type = $_POST['media_type'];
    $location = $_POST['location'];
    $upload_date = $_POST['upload_date'];

    // Update multimedia table in the database
    $stmt = $connection->prepare("UPDATE multimedias SET user_id=?, media_type=?, location=?, upload_date=? WHERE mid_id=?");

    $stmt->bind_param("ssssi", $user_id, $media_type, $location, $upload_date, $mid_id); // Corrected binding parameters

    if ($stmt->execute()) {
        // Redirect to multimediastable.php after successful update
        header('Location: multimediastable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating media: " . $stmt->error;
    }
}

// Handle delete action
if (isset($_POST['del'])) {
    // Retrieve mid_id for deletion
    $mid_id = $_POST['mid_id'];

    // Delete the media record
    $stmt_delete_media = $connection->prepare("DELETE FROM multimedias WHERE mid_id = ?");
    $stmt_delete_media->bind_param("i", $mid_id);

    if ($stmt_delete_media->execute()) {
        // Redirect to multimediastable.php after successful deletion
        header('Location: multimediastable.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting media: " . $stmt_delete_media->error;
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="mid_id">mid_id:</label>
        <input type="number" name="mid_id" value="<?php echo isset($mid_id) ? $mid_id : ''; ?>" readonly>
        <br><br>
        <label for="user_id">user_id:</label>
        <input type="number" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <br><br>
        <label for="media_type">media_type:</label>
        <input type="text" name="media_type" value="<?php echo isset($media_type) ? $media_type : ''; ?>">
        <br><br>
        <label for="location">location:</label>
        <input type="text" name="location" value="<?php echo isset($location) ? $location : ''; ?>">
        <br><br>
        <label for="upload_date">upload_date:</label>
        <input type="date" name="upload_date" value="<?php echo isset($upload_date) ? $upload_date : ''; ?>">
        <br><br>
        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this media?')">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>
