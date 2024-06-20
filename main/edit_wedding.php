<?php 
    require_once "../inc/sessions.php";
    require_once "../inc/functions.php";
    
    // Redirect if session account type is not admin
    if ($_SESSION["account_type"] !== "admin") {
        header("location: ../logout");
        exit(); // Ensure script execution stops after redirection
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['wedding_id'])) {
        $edit_id = $conn->real_escape_string($_POST['wedding_id']);
        $edit_ceremony_date = $conn->real_escape_string($_POST['edit_ceremony_date']);
        $edit_ceremony_time = $conn->real_escape_string($_POST['edit_ceremony_time']);
        $edit_fees = $conn->real_escape_string($_POST['edit_fees']);
        $edit_bride_full_name = $conn->real_escape_string($_POST['edit_bride_full_name']);
        $edit_bride_contact = $conn->real_escape_string($_POST['edit_bride_contact']);
        $edit_groom_full_name = $conn->real_escape_string($_POST['edit_groom_full_name']); // Check field name consistency
        $edit_groom_contact = $conn->real_escape_string($_POST['edit_groom_contact']); // Check field name consistency
        
        // SQL to update wedding details
        $sqlUpdate = "UPDATE tbl_wedding SET ceremony_date = ?, ceremony_time = ?, fees = ?, bride_full_name = ?, bride_contact = ?, groom_full_name = ?, groom_contact = ? WHERE wedding_id = ?";
        
        // Prepare and bind the statement
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("ssissssi", $edit_ceremony_date, $edit_ceremony_time, $edit_fees, $edit_bride_full_name, $edit_bride_contact, $edit_groom_full_name, $edit_groom_contact, $edit_id);
    
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Wedding details updated successfully'); window.location.href = 'wedding.php';</script>";
        } else {
            echo "<script>alert('Error updating wedding details: " . $stmt->error . "'); window.location.href = 'wedding.php';</script>";
        }
    
        // Close statement
        $stmt->close();
    } else {
        echo "<script>alert('Invalid request'); window.location.href = 'wedding.php';</script>";
    }
    
?>
