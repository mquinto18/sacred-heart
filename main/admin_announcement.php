<?php
    require_once "../inc/sessions.php";
    require_once "../inc/functions.php";

    // Redirect if session account type is not admin
    if ($_SESSION["account_type"] !== "admin") {
        header("location: ../logout");
        exit(); // Ensure script execution stops after redirection
    }

    $sql = "SELECT * FROM tbl_announcement";
    $result = $conn->query($sql);

    if (isset($_GET['delete_id'])) {
        $delete_id = $conn->real_escape_string($_GET['delete_id']);
        echo "Delete ID: $delete_id"; // Debugging statement
    
        // SQL to delete data from tbl_announcement
        $sqlDelete = "DELETE FROM tbl_announcement WHERE id = ?";
        echo "SQL Query: $sqlDelete"; // Debugging statement
    
        // Prepare and bind the statement
        $stmt = $conn->prepare($sqlDelete);
        $stmt->bind_param("i", $delete_id);
    
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Announcement deleted successfully');</script>";
        } else {
            echo "<script>alert('Error deleting announcement: " . $stmt->error . "');</script>";
        }
    
        // Close statement
        $stmt->close();
    }
?>


<!DOCTYPE html>
<html lang="en">
    <?php require_once "template-parts/head.php"; ?>

    <style>
        .backgroundimg{
            background-image: url(img/img/about.png);
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            position: absolute;
            top:0;
            z-index: -1;
        }
        .announcement-table {
            display: flex;
            justify-content: center;
            text-align: center;
            font-family: "Poppins";
            max-height: 63vh;
            overflow-y: scroll; /* Add vertical scroll */
        }
        .announcement-table table{
            font-size: 15px;
            width: 180vh;
        }

        .announcement-table th {
            padding: 15px 30px;
            background-color: #0242a3; 
            color: white;
            position: sticky;
            text-align: center;
            top: 0;
        }
        .announcement-table td {
            padding: 15px;
            text-align: center;
        } 
        tr:nth-child(even){
            background-color: rgba(242,247,255,1);
        }
        tr:nth-child(odd){
            background-color: #ebf3ff;
        }
        .announcement-table td:nth-child(4){
            width: 100%;  
        }
        .announcement-table td:nth-child(2){
            width: 20%;  
        }
        .container-announcement-form {
            position: absolute;
            width: 100%;
            height: 100%;   
            background-color: rgba(0,0,0,0.50);
            z-index: 1;
            top: 0;
        }
        .form-container{
            width: 70vh;    
            position: relative;
            top: 28%;
            border-radius: 20px;
        }
        .announcement-spacing{
            margin: 20px;
            padding: 20px;
        }
        .announcement-spacing div{
            margin: 10px 0;
        }
        .announcement-spacing input[type="submit"]{
            width: 100%;
            margin: 10px 0 20px 0;
        }
        .announcement-table img {
            max-width: 100px; /* Adjust as needed */
            max-height: 100px; /* Adjust as needed */
        }


    </style>
<body>
<?php require_once "template-parts/navLogin.php"; ?>

<div class="backgroundimg"></div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h5 class="mt-4">Announcement</h5>
        </div>
    </div> <!-- end of row -->
</div> <!-- end of container -->
<hr>

<div class="">
     <!-- Positioned form container -->
     <div id="announcementForm" class="container-announcement-form" style="display: none;">
            <div style="background-color: white;" class="form-container container mt-4" >
                <div class="announcement-spacing">
                    <i style="position: absolute; right: 25px; cursor: pointer;" class="fa-solid fa-x" onclick="hideForm()"></i>
                    <h2 class="mb-4">Announcement Form</h2>
                    <form action="<?php htmlspecialchars("PHP_SELF"); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Enter date" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="time">Time:</label>
                            <input type="time" class="form-control" id="time" name="time" placeholder="Enter time" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="description">Announcement:</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter announcement" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <input type="submit" name="announcementBtn" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>

    <div id="editFormContainer" class="container-announcement-form" style="display: none;">
        <div style="background-color: white;" class="form-container container mt-4" >
            <div class="announcement-spacing">
                <i style="position: absolute; right: 25px; cursor: pointer;" class="fa-solid fa-x" onclick="hideEditForm()"></i>
                <h2 class="mb-4">Edit Announcement</h2>
                <!-- Edit announcement form -->
                <form action="edit_announcement.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="editDescription">Announcement:</label>
                        <textarea class="form-control" id="editDescription" name="edit_description" placeholder="Enter announcement" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editImage">Image:</label>
                        <input type="file" class="form-control-file" id="editImage" name="edit_image">
                    </div>
                    <input type="hidden" id="editId" name="edit_id">
                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </div>

    <a  onclick="showForm()" href="#" style="width: 10vh; margin-left: 1vh;" class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalAddEvents"><i class="fa-solid fa-plus"></i> New</a>
    <hr>

    <div class="announcement-table">
            <table>
                <thead>
                    <th>ID</th>
                    <th>DATE</th>
                    <th>TIME</th>
                    <th>ANNOUNCEMENT</th>
                    <th>IMAGE</th> <!-- Added column for image -->
                    <th>ACTION</th>
                </thead>
                <tbody>
                    <?php
                    // Check if there are rows in the result
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['time'] . "</td>";
                            echo "<td>" . $row['announcement'] . "</td>";
                            // Display image if available
                            if (!empty($row['image'])) {
                                echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image'></td>";
                            } else {
                                echo "<td>No Image</td>";
                            }
                            // Action buttons
                            echo "<td>";
                            // Edit form button
                            echo "<form method='POST' action='edit_announcement.php'>";
                            echo "<input type='hidden' name='edit_id' value='" . $row['id'] . "'>";
                            echo "<button type='button' class='btn btn-outline-success' onclick=\"showEditForm('" . $row['id'] . "', '" . $row['announcement'] . "')\"><i class='fa-solid fa-pencil'></i></button>";
                            echo "</form>";
                            // Delete button
                            echo "<form method='POST' action='delete_announcement.php'>";
                            echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
                            echo "<button type='submit' class='btn btn-outline-danger'><i class='fa-solid fa-eraser'></i></button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // If no rows found, display a message
                        echo "<tr><td colspan='6'>No announcements found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    function showForm() {
        document.getElementById('announcementForm').style.display = 'block';
    }

    function hideForm() {
        document.getElementById('announcementForm').style.display = 'none';
    }
    
    // Set current date and time as default values for date and time inputs
    const currentDate = new Date().toISOString().split('T')[0];
    const currentTime = new Date().toLocaleTimeString('en-US', {hour12: false});

    document.getElementById('date').value = currentDate;
    document.getElementById('time').value = currentTime;
</script>

<script>
    function showEditForm(id, description) {
        document.getElementById('editId').value = id;
        document.getElementById('editDescription').value = description;
        document.getElementById('editFormContainer').style.display = 'block';
    }

    function hideEditForm() {
        document.getElementById('editFormContainer').style.display = 'none';
    }
</script>

<?php require_once "template-parts/bottom.php"; ?>
</body>
</html>