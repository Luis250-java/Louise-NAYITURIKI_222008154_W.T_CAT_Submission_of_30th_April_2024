<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["imagefile"]) && $_FILES["imagefile"]["error"] == 0) {
        // Example user ID, you should get this dynamically based on your user authentication
        $userId = 1;

        // Absolute directory path
        $targetDir = "C:/Xampp/htdocs/phpcat/images/";

        // Ensure the target directory exists and has appropriate permissions
        if (!file_exists($targetDir)) {
            echo "Error: Target directory does not exist.";
            exit;
        }

        // Get the file name and extension
        $fileName = basename($_FILES["imagefile"]["name"]);
        $targetFile = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Determine media type based on file extension
        if ($fileType == "jpeg" || $fileType == "jpg" || $fileType == "png" || $fileType == "webp") {
            $media_type = "image";
        } else {
            echo "Unsupported Image format. Please upload an image file in jpeg, png, jpg, or webp format.";
            exit;
        }

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $targetFile)) {
            // Database connection parameters
            $servername = "localhost";
            $username = "lulu";
            $password = "222008154"; 
            $dbname = "Students attendance database";

            // Create database connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check database connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare SQL statement to insert into multimedia table
            $sql = "INSERT INTO multimedias (user_id, media_type, location, upload_date) VALUES (?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $userId, $media_type, $targetFile);

            // Execute the prepared statement
            if ($stmt->execute()) {
                echo "Image uploaded successfully.";
            } else {
                echo "Error uploading Image: " . $stmt->error;
            }

            // Close the database connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Error uploading Image.";
        }
    } else {
        echo "Error uploading Image.";
    }
}
?>