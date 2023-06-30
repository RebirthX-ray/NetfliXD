<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["movieFile"]) && $_FILES["movieFile"]["error"] == UPLOAD_ERR_OK) {
        $allowedExtensions = ["mp4", "mov"]; // Specify the allowed file extensions
        $tempFilePath = $_FILES["movieFile"]["tmp_name"];
        $fileName = $_FILES["movieFile"]["name"];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $destination = "uploads/" . uniqid() . "." . $fileExtension;

        // Check if the file extension is allowed
        if (in_array($fileExtension, $allowedExtensions)) {
            // Move the uploaded file to the desired location
            if (move_uploaded_file($tempFilePath, $destination)) {
                echo "File uploaded successfully!";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Error: Invalid file extension. Only MP4 and MOV files are allowed.";
        }
    } else {
        echo "Error: Please select a movie file.";
    }
}
?>
