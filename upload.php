<?php
$password = "admin123"; // Change this to your desired admin password

// Check if the user submitted the password form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["password"])) {
    $enteredPassword = $_POST["password"];

    // Verify the entered password
    if ($enteredPassword == $password) {
        // Password is correct, handle the file upload
        if (isset($_FILES["videoFile"]) && $_FILES["videoFile"]["error"] == UPLOAD_ERR_OK) {
            $tempFilePath = $_FILES["videoFile"]["tmp_name"];
            $fileName = $_FILES["videoFile"]["name"];
            $destination = "uploads/" . $fileName;

            if (move_uploaded_file($tempFilePath, $destination)) {
                echo "Video uploaded successfully!";
            } else {
                echo "Error uploading video.";
            }
        } else {
            echo "Error: Please select a video file.";
        }
    } else {
        echo "Error: Incorrect password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <header>
    <h1>Admin Login</h1>
  </header>

  <main>
    <form action="upload.php" method="post">
      <label for="password">Password:</label>
      <input type="password" name="password">
      <input type="submit" value="Login">
    </form>
  </main>

  <footer>
    <p>&copy; 2023 Video Upload</p>
  </footer>
</body>
</html>


