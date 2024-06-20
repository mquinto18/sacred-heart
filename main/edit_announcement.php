<?php
require_once "../inc/sessions.php";
require_once "../inc/functions.php";

// Redirect if session account type is not admin
if ($_SESSION["account_type"] !== "admin") {
    header("location: ../logout");
    exit(); // Ensure script execution stops after redirection
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_id'])) {
    $edit_id = $conn->real_escape_string($_POST['edit_id']);
    $edit_description = $conn->real_escape_string($_POST['edit_description']);

    // Handling image upload
    $edit_imageData = '';
    if (isset($_FILES['edit_image']) && $_FILES['edit_image']['error'] === UPLOAD_ERR_OK) {
        $edit_imageData = file_get_contents($_FILES['edit_image']['tmp_name']);
        if ($edit_imageData === false) {
            echo "<script>alert('Error uploading image');</script>";
            exit;
        }
        // You might want to perform additional checks/validation on the image here
    }

    // SQL to update announcement
    $sqlUpdate = "UPDATE tbl_announcement SET announcement = ?, image = ? WHERE id = ?";

    // Prepare and bind the statement
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("ssi", $edit_description, $edit_imageData, $edit_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Announcement updated successfully'); window.location.href = 'admin_announcement.php';</script>";
    } else {
        echo "<script>alert('Error updating announcement: " . $stmt->error . "'); window.location.href = 'admin_announcement.php';</script>";
    }

    // Close statement
    $stmt->close();
} else {
    echo "<script>alert('Invalid request'); window.location.href = 'admin_announcement.php';</script>";
}
?>
