<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["movieFile"]) && $_FILES["movieFile"]["error"] == UPLOAD_ERR_OK) {
        $tempFilePath = $_FILES["movieFile"]["tmp_name"];
        $fileName = $_FILES["movieFile"]["name"];
        $destination = "uploads/" . $fileName;

        // Move the uploaded file to the desired location
        if (move_uploaded_file($tempFilePath, $destination)) {
            echo "File uploaded successfully!";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Error: Please select a movie file.";
    }
}
?>
