<?php

function build_calendar($month, $year) {
    include("conn.php");
    
    // Adding more two tables or joining
    $stmt = $conn->prepare("SELECT * FROM tbl_event LEFT JOIN tbl_wedding ON MONTH(tbl_event.date_entry) = MONTH(tbl_wedding.ceremony_date) AND YEAR(tbl_event.date_entry) = YEAR(tbl_wedding.ceremony_date) LEFT JOIN tbl_baptismal ON MONTH(tbl_event.date_entry) = MONTH(tbl_baptismal.reservation_date) AND YEAR(tbl_event.date_entry) = YEAR(tbl_baptismal.reservation_date) WHERE MONTH(tbl_event.date_entry) = ? AND YEAR(tbl_event.date_entry) = ?");
    
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // access columns by their alias or table name
                $eventDate = $row["date_entry"];
                $weddingDate = $row["ceremony_date"];
                $baptismalDate = $row["reservation_date"];
                
                $bookings[] = [
                    "event_date" => $eventDate,
                    "wedding_date" => $weddingDate,
                    "baptismal_date" => $baptismalDate
                ];
            }
            $stmt->close();
        }
    }
    
    $month = isset($_GET['month']) ? $_GET['month'] : date('m');
    $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    $numericMonth = date('n', $firstDayOfMonth);
    $numberDays = cal_days_in_month(CAL_GREGORIAN, $numericMonth, $year);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    
    $datetoday = date('Y-m-d');
    
    $calendar = "<div class='table-responsive'><table class='table table-hover'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= " <a class='btn btn-xs btn-danger' href='?month=" . date('m') . "&year=" . date('Y') . "'>Current Month</a> ";
    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $numericMonth + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $numericMonth + 1, 1, $year)) . "'>Next Month</a></center><br>";
    
    $calendar .= "<tr>";
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th  class='header'>$day</th>";
    }
    
    $currentDay = 1;
    $calendar .= "</tr><tr>";
    
    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td  class='empty'></td>";
        }
    }
    
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    
    while ($currentDay <= $numberDays) {
    if ($dayOfWeek == 7) {
        $dayOfWeek = 0;
        $calendar .= "</tr><tr>";
    }

    $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
    $date = "$year-$month-$currentDayRel";

    $dayname = strtolower(date('l', strtotime($date)));
    $eventNum = 0;
    $today = $date == date('Y-m-d') ? "today" : "";

    $buttonColor = getButtonColor($date, $bookings, $conn);
    $buttonText = getButtonText($date, $bookings, $buttonColor);
    $textvalue = getTextValue($date, $bookings, $buttonText);

    $calendar .= "<td class='$today'>";
    
    // Check if the date is booked for any event type
    $isBooked = in_array($date, array_column($bookings, "event_date")) ||
                in_array($date, array_column($bookings, "wedding_date")) ||
                in_array($date, array_column($bookings, "baptismal_date"));

    if (strtotime($date) < strtotime($datetoday)) {
        $calendar .= "<h4>$currentDay</h4> <button class='btn btn-danger btn-xs' disabled>N/A</button>";
    } elseif ($isBooked) {
        // Check the specific event type for the booked date
        $calendar .= "<h4>$currentDay</h4> <button class='btn btn-$buttonColor btn-xs'> <span class='glyphicon glyphicon-lock'></span>$textvalue</button>";
    } else {
        $calendar .= "<h4>$currentDay</h4> <a type='button' href='login' class='btn btn-$buttonColor btn-xs'> <span class='glyphicon glyphicon-ok'></span> $buttonText</a>";
    }
    
    $calendar .= "</td>";

    $currentDay++;
    $dayOfWeek++;
}
    
    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($l = 0; $l < $remainingDays; $l++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    
    $calendar .= "</tr>";
    $calendar .= "</table></div>";
    echo $calendar;
}

function getButtonColor($date, $bookings, $conn) {
    $stmt = $conn->prepare("SELECT event_title FROM tbl_event WHERE date_entry = ?");
    $stmt->bind_param('s', $date);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $eventTitle = $row["event_title"];

            
            switch ($eventTitle) {
                case "Baptismal":
                case "Mass":
                    return "primary"; 
                case "Wedding":
                case "Kumpil":
                    return "danger"; 
                default:
                    return "success"; 
            }
        }
    }

    return "success"; 
}

function getButtonText($date, $bookings, $buttonColor) {
   
    if (in_array($date, array_column($bookings, "event_date"))) {
        return $buttonColor === "danger" ? "Already Booked" : "Booked";
    } elseif (in_array($date, array_column($bookings, "wedding_date"))) {
        return $buttonColor === "danger" ? "Already Booked for Wedding" : "Booked for Wedding";
    } elseif (in_array($date, array_column($bookings, "baptismal_date"))) {
        return $buttonColor === "danger" ? "Already Booked for Baptismal" : "Booked for Baptismal";
    } else {
        if ($buttonColor === "primary") {
            return "Limited Time";
        } elseif ($buttonColor === "danger") {
            return "Already Booked";
        } else {
            return "Available Dates";
        }
    }
}

function getTextValue($date, $bookings, $buttonText){
    if (in_array($date, array_column($bookings, "event_date"))) {
        return $buttonText === "Already Booked" ? "Already Booked" : "Limited Time";
    } elseif (in_array($date, array_column($bookings, "wedding_date"))) {
        return $buttonText === "Already Booked for Wedding" ? "Already Booked for Wedding" : "Booked for Wedding";
    } elseif (in_array($date, array_column($bookings, "baptismal_date"))) {
        return $buttonText === "Already Booked for Baptismal" ? "Already Booked for Baptismal" : "Booked for Baptismal";
    } else {
        if ($buttonText === "Limited Time") {
            return "Limited Time";
        } elseif ($buttonText === "Already Booked") {
            return "Already Booked";
        } else {
            return "Available Dates";
        }
    }
}

?>