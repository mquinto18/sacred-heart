<?php 
    require_once "../inc/sessions.php";
    require_once "../inc/functions.php";
    
    // Redirect if session account type is not admin
    if ($_SESSION["account_type"] !== "admin") {
        header("location: ../logout");
        exit(); // Ensure script execution stops after redirection
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_baptismal_id'])) {
        $edit_id = $conn->real_escape_string($_POST['edit_baptismal_id']);
        $edit_or_number = $conn->real_escape_string($_POST['edit_or_number']);
        $edit_fees = $conn->real_escape_string($_POST['edit_fees']);
        $edit_reservation_date = $conn->real_escape_string($_POST['edit_reservation_date']);
        $edit_reservation_time = $conn->real_escape_string($_POST['edit_reservation_time']);
        $edit_baptismal_name= $conn->real_escape_string($_POST['edit_baptismal_name']);
        $edit_baptismal_date = $conn->real_escape_string($_POST['edit_baptismal_date']);
        $edit_gender = $conn->real_escape_string($_POST['edit_gender']);
        $edit_birth_place = $conn->real_escape_string($_POST['edit_birth_place']);
        $edit_father_name= $conn->real_escape_string($_POST['edit_father_name']);
        $edit_father_birth_place= $conn->real_escape_string($_POST['edit_father_birth_place']);
        $edit_mother_name= $conn->real_escape_string($_POST['edit_mother_name']);
        $edit_mother_birth_place= $conn->real_escape_string($_POST['edit_mother_birth_place']);
        $edit_contact= $conn->real_escape_string($_POST['edit_contact']);
        $edit_marriage_type= $conn->real_escape_string($_POST['edit_marriage_type']);
        $edit_priest= $conn->real_escape_string($_POST['edit_priest']);

        
        // SQL to update baptismal details
        $sqlUpdate = "UPDATE tbl_baptismal SET 
                      or_number = ?, 
                      fee = ?, 
                      reservation_date = ?, 
                      time_reservation = ?, 
                      baptismal_name = ?, 
                      baptismal_date = ?, 
                      gender = ?, 
                      birth_place = ?, 
                      father_name = ?, 
                      father_birth_place = ?, 
                      mother_name = ?, 
                      mother_birth_place = ?, 
                      contact = ?, 
                      type_of_marriage = ?, 
                      priest = ? 
                      WHERE baptismal_id = ?";
        
        // Prepare and bind the statement
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("sssssssssssssssi", 
                  $edit_or_number, 
                  $edit_fees, 
                  $edit_reservation_date, 
                  $edit_reservation_time, 
                  $edit_baptismal_name, 
                  $edit_baptismal_date, 
                  $edit_gender, 
                  $edit_birth_place, 
                  $edit_father_name, 
                  $edit_father_birth_place, 
                  $edit_mother_name, 
                  $edit_mother_birth_place, 
                  $edit_contact, 
                  $edit_marriage_type, 
                  $edit_priest,
                $edit_id    
                );
    
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Baptismal details updated successfully'); window.location.href = 'baptismal.php';</script>";
        } else {
            echo "<script>alert('Error updating baptismal details: " . $stmt->error . "'); window.location.href = 'baptismal.php';</script>";
        }
    
        // Close statement
        $stmt->close();
    } else {
        echo "<script>alert('Invalid request'); window.location.href = 'baptismal.php';</script>";
    }
?>
