<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["videofile"]) && $_FILES["videofile"]["error"] == 0) {
        // Example user ID; replace with your dynamic user authentication logic
        $userId = 1;

        // Absolute directory path
        $targetDir = "C:/Xampp/htdocs/phpcat/Videos/";

        // Ensure the target directory exists and has appropriate permissions
        if (!file_exists($targetDir)) {
            echo "Error: Target directory does not exist.";
            exit;
        }

        // Get the file name and extension
        $fileName = basename($_FILES["videofile"]["name"]);
        $targetFile = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Allow certain file formats (adjust as needed)
        $allowedFormats = array("mp4", "avi", "mov", "wmv");
        if (!in_array($fileType, $allowedFormats)) {
            echo "Unsupported file format. Please upload a video file.";
            exit;
        }

        // Generate a unique file name to prevent overwriting
        $uniqueFileName = uniqid() . '_' . $fileName;
        $targetFileUnique = $targetDir . $uniqueFileName;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["videofile"]["tmp_name"], $targetFileUnique)) {
            // Database connection parameters
include('databaseconnection.php');

            // Prepare SQL statement to insert into multimedia table
            $sql = "INSERT INTO multimedias (user_id, media_type, location, upload_date) VALUES (?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $userId, $media_type, $targetFileUnique);

            // Determine media type based on file extension
            $media_type = "video";

            // Execute the prepared statement
            if ($stmt->execute()) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file: " . $stmt->error;
            }

            // Close the database connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Error uploading file.";
    }
}
?>
