<?php
require_once "../inc/sessions.php";
require_once "../inc/functions.php";

// Redirect if session account type is not admin
if ($_SESSION["account_type"] !== "admin") {
    header("location: ../logout");
    exit(); // Ensure script execution stops after redirection
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $conn->real_escape_string($_POST['delete_id']);

    // SQL to delete data from tbl_announcement
    $sqlDelete = "DELETE FROM tbl_announcement WHERE id = ?";
    
    // Prepare and bind the statement
    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param("i", $delete_id);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Reset auto-increment to 1
        $sqlResetAutoIncrement = "ALTER TABLE tbl_announcement AUTO_INCREMENT = 1";
        $conn->query($sqlResetAutoIncrement);
        
        echo "<script>alert('Announcement deleted successfully'); window.location.href = 'admin_announcement.php';</script>";
    } else {
        echo "<script>alert('Error deleting announcement: " . $stmt->error . "'); window.location.href = 'admin_announcement.php';</script>";
    }

    // Close statement
    $stmt->close();
} else {
    echo "<script>alert('Invalid request'); window.location.href = 'admin_announcement.php';</script>";
}
?>
