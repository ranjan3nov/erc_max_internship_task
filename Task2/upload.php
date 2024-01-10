<?php

session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {

        $targetDir = "uploads/";
        
        // Generate a unique filename 
        $fileName = uniqid("image_") . "_" . basename($_FILES["image"]["name"]);
        $targetPath = $targetDir . $fileName;

        // Current Max Size is 2 mb
        $allowedTypes = ["image/jpeg", "image/png"];
        $maxFileSize = 2 * 1024 * 1024;

        // Validate file type
        if (in_array($_FILES["image"]["type"], $allowedTypes)) {
            // Validate file size
            if ($_FILES["image"]["size"] <= $maxFileSize) {
                // Move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {
                    // Display the uploaded image
                    $_SESSION['img_sr'] = $targetPath;
                    header('Location: ./index.php');
                    exit();
                } else {
                    $_SESSION['error'] = 'Error uploading the file.';
                    header('Location: ./index.php');
                    exit();
                }
            } else {
                $_SESSION['error'] = 'File size exceeds the limit.';
                header('Location: ./index.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 'Invalid file type. Please upload a JPEG or PNG image.';
            header('Location: ./index.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'Error uploading the file.';
        header('Location: ./index.php');
        exit();
    }
}
