<?php
require_once "../inc/sessions.php";
require_once "../inc/functions.php";

// Check if the user is a super admin, otherwise, redirect to logout
$_SESSION["account_type"] == "super admin" ?: header("location: ../logout");

// Fetch data for the table
$tbl_financial_query = $conn->query("SELECT * FROM tbl_church_expenses ORDER BY expenses_id DESC, date_receipt DESC"); // prioritize the latest transaction

// Fetch data for the chart (overall monthly)
$chartDataQuery = "SELECT 'donate' AS source, MONTH(donate_on) AS month, SUM(donate_amount) AS total_amount
                   FROM parish_db.tbl_donate
                   GROUP BY MONTH(donate_on)
                   
                   UNION
                   
                   SELECT 'wedding' AS source, MONTH(date_encoded) AS month, SUM(fees) AS total_amount
                   FROM parish_db.tbl_wedding
                   GROUP BY MONTH(date_encoded)
                   
                   UNION
                   
                   SELECT 'baptismal' AS source, MONTH(reservation_date) AS month, SUM(fee) AS total_amount
                   FROM parish_db.tbl_baptismal
                   WHERE status = 'approved'
                   GROUP BY MONTH(reservation_date)";

$chartDataResult = $conn->query($chartDataQuery);

// Organize data for the chart
$labels = [];
$donateAmounts = [];
$weddingAmounts = [];
$baptismalAmounts = [];

// Initialize labels for all twelve months
for ($i = 1; $i <= 12; $i++) {
    $monthName = date("M", mktime(0, 0, 0, $i, 1)); 
    $labels[] = $monthName;
    $donateAmounts[] = 0; // Set total donate amount to 0 initially
    $weddingAmounts[] = 0; // Set total wedding fee to 0 initially
    $baptismalAmounts[] = 0; // Set total baptismal fee to 0 initially
}

// Loop through the result set and populate the total amounts for available months
while ($row = $chartDataResult->fetch_assoc()) {
    $monthIndex = $row['month'] - 1; // Month index starts from 0
    $totalAmount = $row['total_amount'];
    $source = $row['source'];

    // Store total amounts in the respective month index based on the source
    switch ($source) {
        case 'donate':
            $donateAmounts[$monthIndex] = $totalAmount;
            break;
        case 'wedding':
            $weddingAmounts[$monthIndex] = $totalAmount;
            break;
        case 'baptismal':
            $baptismalAmounts[$monthIndex] = $totalAmount;
            break;
        default:
            break;
    }
}

// Now you have three arrays $donateAmounts, $weddingAmounts, $baptismalAmounts containing data for each month.
// You can use these arrays to generate a bar graph using a JavaScript charting library.


// Fetch data for each transaction type separately PIEEEE
$transactionTypes = ['donation', 'expenses', 'wedding', 'baptismal', 'others','maintenance','utilities','salaries&wages','office_administration'];

// Initialize arrays to store data for each transaction type
$typeLabels = [];
$typeTotalAmounts = [];
$typeColors = [
    'rgba(75, 192, 192, 0.8)', // Teal with transparency
    'rgba(255, 99, 132, 0.8)', // Red with transparency
    'rgba(255, 206, 86, 0.8)', // Yellow with transparency
    'rgba(54, 162, 235, 0.8)', // Blue with transparency
    'rgba(255, 159, 64, 0.8)', // Orange with transparency
];
 // Colors for legend
 foreach ($transactionTypes as $type) {
    // Fetch data for the current transaction type
    $typeDataQuery = "SELECT MONTH(date_receipt) AS month, SUM(expenses) AS total_amount
                      FROM tbl_church_expenses
                      WHERE type_of_transaction = '$type'
                      GROUP BY MONTH(date_receipt)";
    $typeDataResult = $conn->query($typeDataQuery);

    // Loop through the result set and populate the arrays for the current transaction type
    $typeLabels[$type] = [];
    $typeTotalAmounts[$type] = [];

    // Initialize labels for all twelve months for the current transaction type
    for ($i = 1; $i <= 12; $i++) {
        $monthName = date("F", mktime(0, 0, 0, $i, 1));
        $typeLabels[$type][] = $monthName;
        $typeTotalAmounts[$type][] = 0; // Set total amount to 0 initially
    }

    // Populate the total amounts for the current transaction type
    while ($row = $typeDataResult->fetch_assoc()) {
        $monthIndex = $row['month'] - 1; // Month index starts from 0
        $totalAmount = $row['total_amount'];

        // Store total amounts in the respective month index
        $typeTotalAmounts[$type][$monthIndex] = $totalAmount;
    }
}

// Organize data for the pie chart
$pieLabels = [];
$pieTotalAmounts = [];

// Loop through each transaction type
foreach ($transactionTypes as $type) {
    // Exclude specific transaction types from the pie chart
    if ($type !== 'donation' && $type !== 'baptismal' && $type !== 'expenses' && $type !== 'wedding') {
        // Calculate the total amount for the current transaction type
        $totalAmount = array_sum($typeTotalAmounts[$type]);

        // Add the transaction type and its total amount to the pie chart data
        $pieLabels[] = $type;
        $pieTotalAmounts[] = $totalAmount;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "template-parts/head.php"; ?>

<body>

<?php 
require_once "template-parts/navLogin.php";
require_once "modal/updatePassModal.php"; 
?>
<style>
    .backgroundimg{
        background-image: url(../img/img/about.png);
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
        height: 190vh;
        position: absolute;
        top:0;
        z-index: -1;
    }
    .amount-text{
        display: flex;
        justify-content: space-between;
        padding: 0 220px;
        text-shadow: 2px 2px 2px rgba(0,0,0,0.1);
    }
    .amount-text h1{
        font-size: 20px;
    }
</style>

<div class="backgroundimg"> </div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12 mt-3">
        </div>
    </div> <!-- end of row -->
</div> <!-- end of container -->
<hr>
<!-- mema Dashboard -->
<?php
function formatCurrency($value) {
    return '₱' . number_format($value, 2, '.', ',');
}

function connectToDatabase() {
    $connect = new mysqli("localhost", "root", "", "parish_db");

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    return $connect;
}

// Call the function to establish the database connection
$connect = connectToDatabase();

$query_donation = "SELECT SUM(donate_amount) AS TOTAL FROM tbl_donate";
$result_donation = $connect->query($query_donation);
$row_donation = $result_donation->fetch_assoc();
$total_donation = $row_donation["TOTAL"];

$query_wedding = "SELECT SUM(fees) AS TOTAL FROM tbl_wedding";
$result_wedding = $connect->query($query_wedding);
$row_wedding = $result_wedding->fetch_assoc();
$total_wedding = $row_wedding["TOTAL"];

$query_baptismal = "SELECT SUM(fee) AS TOTAL FROM tbl_baptismal WHERE status = 'Approved'"; // Only approved baptismal records are considered
$result_baptismal = $connect->query($query_baptismal);
$row_baptismal = $result_baptismal->fetch_assoc();
$total_baptismal = $row_baptismal["TOTAL"];

$query_user = "SELECT SUM(expenses) AS TOTAL FROM tbl_church_expenses";
$result_user = $connect->query($query_user);
$row_user = $result_user->fetch_assoc();
$total_user = $row_user["TOTAL"];

// Close the database connection when done (optional)
$connect->close();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 p-md-2 p-2">
            <div class="bg-primary p-3 p-0 text-light">
                <div class="row">
                    <div class="col-6 text-center">
                        <h4><?php echo formatCurrency($total_donation); ?></h4>
                        <p class="text-center">Total Donation</p>
                    </div>
                    <div class="col-6 pt-2">
                        <img src="https://cdn3.iconfinder.com/data/icons/donate-1/67/17-512.png" alt="" width="50px" style="filter: brightness(0) invert(1);">
                    </div>
                </div>
                <hr>
                <div class="col-md-12 text-center">
                    <!-- <a href="donations" class="text-decoration-none text-light">More Info</a> <i class="fas fa-arrow-circle-right"></i> -->
                </div>
            </div>
        </div>

        <!-- Repeat the structure for other datasets -->
        <div class="col-md-3 p-md-2 p-2">
            <div class="bg-success p-3 text-light">
                <div class="row">
                    <div class="col-6 text-center">
                        <h4><?php echo formatCurrency($total_wedding); ?></h4>
                        <p class="text-center">Total Wedding</p>
                    </div>
                    <div class="col-6 pt-2 text-center">
                        <h1><img src="https://cdn3.iconfinder.com/data/icons/marriage/247/marriage-marry-001-1024.png" alt="" width="50px" style="filter: brightness(0) invert(1);" ></h1>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 text-center">
                    <!-- <a href="wedding" class="text-decoration-none text-light">More Info</a> <i class="fas fa-arrow-circle-right"></i> -->
                </div>
            </div>
        </div>

        <div class="col-md-3 p-md-2 p-2">
            <div class="bg-danger p-3 text-light">
                <div class="row">
                    <div class="col-6 text-center">
                        <h4><?php echo formatCurrency($total_baptismal); ?></h4>
                        <p class="text-center">Baptismal</p>
                    </div>
                    <div class="col-6 pt-2 text-center">
                        <h1><i class="fas fa-calendar-week"></i></h1>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 text-center">
                    <!-- <a href="events" class="text-decoration-none text-light">More Info</a> <i class="fas fa-arrow-circle-right"></i> -->
                </div>
            </div>
        </div>

        <div class="col-md-3 p-md-2 p-2">
            <div class="bg-warning p-3 text-light">
                <div class="row">
                    <div class="col-6 text-center">
                        <h4><?php echo formatCurrency($total_user); ?></h4>
                        <p class="text-center">Church Expenses</p>
                    </div>
                    <div class="col-6 pt-2 text-center">
                        <h1><i class="fa-solid fa-church"></i></h1>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 text-center">
                    <!-- <a href="#" class="text-decoration-none text-light">More Info</a> <i class="fas fa-arrow-circle-right"></i> -->
                </div>
            </div>
        </div>
    </div>
</div>



 <!-- Overview? -->
 <section class="mt-5 mb-5">
    <div class="container">
        <div class="amount-text">
            <h1>ACCUMULATED EVENT</h1>
            <h1>CHURCH BREAKDOWN</h1>
        </div>
        <div class="row">
            <!-- <div class="col-md-12 mt-5 text-center">
                <h3 class="overflow-hidden text-primary text-uppercase fw-bolder">Overview</h3>
            </div> -->
        </div>
            <div class="row mt-4">
                <div class="col-md-6">

                    <canvas id="revenueChart"></canvas>
                </div>
            <div class="col-md-6">
                
                <canvas id="transactionTypeChart"></canvas>
            </div>
        </div>
    </div>
</section>                               

<!-- Financial Table -->
<section class="mt-5 mb-5"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 text-center">
                <h3 class="overflow-hidden text-primary text-uppercase fw-bolder">Church Expenses List</h3>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="container-fluid">
                        <!-- <div class="row mb-md-3 mb-2">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalfinance">
                                    <i class="fa-solid fa-plus"></i> New
                                </a>
                            </div> 
                        </div> -->
                        <div id="showData">
                            <table class="table table-hover border border-1 border-dark">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Date</th>
                                        <th>Type of transaction</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Inputted by:</th>
                                    </tr>
                                </thead>
                                <?php 
                                // $ctr = 1;
                                $total_amount = 0;
                                $peso_sign = "\xE2\x82\xB1";
                                while ($row = $tbl_financial_query->fetch_assoc()) {
                                    // Add expenses from each row to the total
                                    $total_amount += $row["expenses"];  
                                    ?>
                                    <tbody>
                                        <tr class="text-center">
                                            <!-- <td><?= $ctr; ?></td> -->
                                            <td><?= $row["expenses_id"]; ?></td>
                                            <td><?= $row["date_receipt"]; ?></td>
                                            <td><?= $row["type_of_transaction"]; ?></td> 
                                            <td><?= isset($row["expenses"]) ? $row["expenses"] : ''; ?></td>
                                            <td><?= $row["description"]; ?></td>
                                            <td><?= $row["encode_by"]; ?></td>
                                        </tr>
                                        <?php	
                                }
                                ?>
                                <tr>
                                    <th class='border'>Total Expenses</th>
                                    <td class="border fw-bolder" colspan="5">
                                        <?php
                                            echo $peso_sign.number_format($total_amount, 2); // Format the total expenses with two decimal places
                                        ?>
                                    </td>
                                </tr>
                                    </tbody>
                                </table>
                                

                                <?php require_once "template-parts/bottom.php"; ?>
                                <!-- <section class="mt-5 mb-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-between align-items-center mb-4">
                                                    <h3 class="overflow-hidden text-primary text-uppercase fw-bolder">Revenue Overview</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <canvas id="revenueChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section> -->
                                <script>
                                    const ctx1 = document.getElementById('revenueChart').getContext('2d');

                                    // Define your delayed animation configuration
                                    let delayed;
                                    const animationConfig = {
                                        onComplete: () => {
                                            delayed = true;
                                        },
                                        delay: (context) => {
                                            let delay = 0;
                                            if (context.type === 'data' && context.mode === 'default' && !delayed) {
                                                delay = context.dataIndex * 100 + context.datasetIndex * 100;
                                            }
                                            return delay;
                                        },
                                    };

                                    // Create your Chart.js chart with the delayed animation
                                    const revenueChart = new Chart(ctx1, {
                                        type: 'bar',
                                        data: {
                                            labels: <?php echo json_encode($labels); ?>,
                                            datasets: [
                                                {
                                                    label: 'Donation',
                                                    data: <?php echo json_encode($donateAmounts); ?>,
                                                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Blue with transparency
                                                    borderColor: 'rgb(54, 162, 235)', // Blue
                                                    borderWidth: 1,
                                                    borderRadius: 2,
                                                    borderSkipped: false,
                                                },
                                                {
                                                    label: 'Wedding',
                                                    data: <?php echo json_encode($weddingAmounts); ?>,
                                                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Green with transparency
                                                    borderColor: 'rgb(75, 192, 192)', // Green
                                                    borderWidth: 1,
                                                    borderRadius: 2,
                                                    borderSkipped: false,
                                                },
                                                {
                                                    label: 'Baptismal',
                                                    data: <?php echo json_encode($baptismalAmounts); ?>,
                                                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Red with transparency
                                                    borderColor: 'rgb(255, 99, 132)', // Red
                                                    borderWidth: 1,
                                                    borderRadius: 2,
                                                    borderSkipped: false,
                                                }
                                            ]
                                        },
                                        options: {
                                            animation: animationConfig, // Apply the delay animation configuration
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                    
                                    
                                    const ctx2 = document.getElementById('transactionTypeChart').getContext('2d');
                                    // Define your delayed animation configuration for the pie chart
                                    let pieDelayed;
                                    const pieAnimationConfig = {
                                        onComplete: () => {
                                            pieDelayed = true;
                                        },
                                        delay: (context) => {
                                            let delay = 0;
                                            if (context.type === 'data' && context.mode === 'default' && !pieDelayed) {
                                                delay = context.dataIndex * 100 + context.datasetIndex * 100;
                                            }
                                            return delay;
                                        },
                                    };

                                    // Create your Chart.js chart for the pie chart with the delayed animation
                                    const transactionTypeChart = new Chart(ctx2, {
                                        type: 'pie',
                                        data: {
                                            labels: <?php echo json_encode($pieLabels); ?>,
                                            datasets: [{
                                                label: 'Transaction Type',
                                                data: <?php echo json_encode($pieTotalAmounts); ?>,
                                                backgroundColor: <?php echo json_encode($typeColors); ?>,
                                                borderWidth: 0
                                            }]
                                        },
                                        options: {
                                            animation: pieAnimationConfig, // Apply the delay animation configuration
                                            plugins: {
                                                tooltip: {
                                                    enabled: true, // Enable tooltip
                                                    callbacks: {
                                                        label: function(context) {
                                                            let label = context.label || '';
                                                            if (label) {
                                                                label += ': ';
                                                            }
                                                            if (context.parsed) {
                                                                label += context.parsed.toLocaleString() + ' (' + ((context.parsed / context.dataset.data.reduce((a, b) => a + b, 0)) * 100).toFixed(2) + '%)';
                                                            }
                                                            return label;
                                                        }
                                                    }
                                                },
                                                legend: {
                                                    display: true, // Display legend
                                                    position: 'right' // Position legend to the right
                                                },
                                                datalabels: {
                                                    display: false // Hide data labels by default
                                                }
                                            },
                                            layout: {
                                                padding: {
                                                    left: 10,
                                                    right: 10,
                                                    top: 10,
                                                    bottom: 10
                                                }
                                            },
                                            responsive: true,
                                            maintainAspectRatio: false,
                                        },
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php
    require_once "template-parts/bottom.php"; 
    ?>
    </body>
    </html>
    