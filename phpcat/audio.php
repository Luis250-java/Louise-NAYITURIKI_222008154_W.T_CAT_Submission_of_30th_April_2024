<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["audiofile"]) && $_FILES["audiofile"]["error"] == 0) {
        // Example user ID, you should get this dynamically based on your user authentication
        $userId = 1;

        // Absolute directory path
        $targetDir = "C:/Xampp/htdocs/phpcat/audio/";

        // Ensure the target directory exists and has appropriate permissions
        if (!file_exists($targetDir)) {
            echo "Error: Target directory does not exist.";
            exit;
        }

        // Get the file name and extension
        $fileName = basename($_FILES["audiofile"]["name"]);
        $targetFile = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Determine media type based on file extension
        if ($fileType == "mp4") {
            $media_type = "video";
        } elseif (in_array($fileType, array("mp3", "m4a"))) {
            $media_type = "audio";
        } elseif (in_array($fileType, array("jpg", "jpeg", "png", "gif"))) {
            $media_type = "image";
        } else {
            echo "Unsupported file format. Please upload an audio, video, or image file.";
            exit;
        }

        // Allow certain file formats (adjust as needed)
        $allowedFormats = array("mp4", "mp3", "m4a", "jpg", "jpeg", "png", "gif");

        if (in_array($fileType, $allowedFormats)) {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["audiofile"]["tmp_name"], $targetFile)) {
                // Database connection parameters
            include('databaseconnection.php');
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare SQL statement to insert into multimedia table
                $sql = "INSERT INTO multimedias (user_id, media_type, location, upload_date) VALUES (?, ?, ?, NOW())";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iss", $userId, $media_type, $targetFile);

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
            echo "Unsupported file format. Please upload an audio, video, or image file.";
        }
    } else {
        echo "Error uploading file.";
    }
}
?>