<?php
require_once "inc/functions.php";

$sql = "SELECT image, date FROM tbl_announcement";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>

    <?php require_once "template-parts/head.php"; ?>
    
    <style>
        .announcement-table {
            display: flex;
            justify-content: center;
            text-align: center;
            font-family: "Poppins";
            margin-top: 10px;
        }
        .announcement-table table{
            font-size: 20px;
            width: 90%;
        }
        .announcement-table th {
            padding: 15px 30px;
            background-color: #0242a3; 
            color: white;
            position: sticky;
            text-align: center;
            top: 0;
            
            border-radius: 10px;
        }
        .announcement-table td {
            padding: 15px;
            text-align: center;
        } 
        .announcement-table img {
            width: 1000px; /* Maximum width for the image */
            height: auto; /* Maintain aspect ratio */
        }
        .announcement-date{
            display: flex;
            text-align: center;
            margin: 10px auto 50px auto;
            font-size: 15px;
            width: 74%;
            color:  #0242a3;
        }

    </style>
</head>
<body>
    <?php require_once "template-parts/sub-nav.php"; ?>

    <div class="backgroundimg"></div>

    <div>
        <div class="announcement-table">
            <table>
                <thead>
                    <th>Announcement</th>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>";
                            echo "<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Announcement Image'>";
                            echo "<div class='announcement-date'>" . $row['date'] . "</div>"; // Display the date
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td>No announcements found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
