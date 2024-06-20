<?php
require_once "../inc/sessions.php";
require_once "../inc/functions.php";

// Check if the user is a super admin, otherwise, redirect to logout
$_SESSION["account_type"] == "super admin" ?: header("location: ../logout");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["transactionDate"])) {
    // Sanitize and validate form data
    $transactionDate = $_POST["transactionDate"];
    $transactionType = $_POST["transactionType"];
    $transactionDescription = $_POST["transactionDescription"];
    $amount = $_POST["amount"];
    $inputtedBy = $_POST["inputtedBy"];

    // Insert data into the database
    $insertQuery = "INSERT INTO tbl_finance (transaction_date, transaction_type, amount, description, inputted_by)
                    VALUES ('$transactionDate', '$transactionType', '$amount', '$transactionDescription', '$inputtedBy')";

    if ($conn->query($insertQuery) === TRUE) {
        // Data inserted successfully
        header("Location: {$_SERVER['PHP_SELF']}"); // Redirect to the same page to refresh the table
        exit();
    } else {
        // Handle errors if any
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

// Create the table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS tbl_finance (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        transaction_date DATE NOT NULL,
                        transaction_type VARCHAR(255) NOT NULL,
                        amount DECIMAL(10, 2) NOT NULL,
                        description VARCHAR(255) NOT NULL,
                        inputted_by VARCHAR(255) NOT NULL
                    )"; // new amount column added to the table

$conn->query($createTableQuery);

// Fetch data for the table
$tbl_finance_query = $conn->query("SELECT * FROM tbl_finance");

// Fetch data for the chart (overall monthly)
$chartDataQuery = "SELECT MONTH(transaction_date) AS month, SUM(amount) AS total_amount
                   FROM tbl_finance
                   GROUP BY MONTH(transaction_date)";
$chartDataResult = $conn->query($chartDataQuery);

// Organize data for the chart
$labels = [];
$totalAmounts = [];

// Initialize labels for all twelve months
for ($i = 1; $i <= 12; $i++) {
    $monthName = date("M", mktime(0, 0, 0, $i, 1)); 
    $labels[] = $monthName;
    $totalAmounts[] = 0; // Set total amount to 0 initially
}

// Loop through the result set and populate the total amounts for available months
while ($row = $chartDataResult->fetch_assoc()) {
    $monthIndex = $row['month'] - 1; // Month index starts from 0
    $totalAmount = $row['total_amount'];

    // Store total amounts in the respective month index
    $totalAmounts[$monthIndex] = $totalAmount;
}

// Fetch data for each transaction type separately
$transactionTypes = ['donation', 'expenses', 'wedding_payment', 'baptismal'];

// Initialize arrays to store data for each transaction type
$typeLabels = [];
$typeTotalAmounts = [];
$typeColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']; // Colors for legend

foreach ($transactionTypes as $type) {
    // Fetch data for the current transaction type
    $typeDataQuery = "SELECT MONTH(transaction_date) AS month, SUM(amount) AS total_amount
                      FROM tbl_finance
                      WHERE transaction_type = '$type'
                      GROUP BY MONTH(transaction_date)";
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
    // Calculate the total amount for the current transaction type
    $totalAmount = array_sum($typeTotalAmounts[$type]);

    // Add the transaction type and its total amount to the pie chart data
    $pieLabels[] = $type;
    $pieTotalAmounts[] = $totalAmount;
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
        height: 110vh;
        position: absolute;
        top:0;
        z-index: -1;
    }
</style>
<div class="backgroundimg"> </div>

<div class="modal fade" id="modalfinance" tabindex="-1" role="dialog" aria-labelledby="modalfinanceLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalfinanceLabel">New Transaction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add your form here -->
        <form id="newTransactionForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="mb-3">
            <label for="transactionDate" class="form-label">Date</label>
            <input type="date" class="form-control" id="transactionDate" name="transactionDate" required>
          </div>
          <div class="mb-3">
            <label for="transactionType" class="form-label">Type of Transaction</label>
            <select class="form-select" id="transactionType" name="transactionType" required>
              <option value="donation">Donation</option>
              <option value="expenses">Expenses</option>
              <option value="wedding_payment">Wedding Payment</option>
              <option value="baptismal">Baptismal</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
          </div>
          <div class="mb-3">
            <label for="transactionDescription" class="form-label">Description</label>
            <input type="text" class="form-control" id="transactionDescription" name="transactionDescription" required>
          </div>
          <div class="mb-3">
            <label for="inputtedBy" class="form-label">Inputted by</label>
            <input type="text" class="form-control" id="inputtedBy" name="inputtedBy" required>
          </div>
          <!-- You may add more fields here as needed -->
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

 <!-- Overview? -->
 <section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 text-center">
                <h3 class="overflow-hidden text-primary text-uppercase fw-bolder">Overview</h3>
            </div>
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
                <h3 class="overflow-hidden text-primary text-uppercase fw-bolder">Financial</h3>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="container-fluid">
                        <div class="row mb-md-3 mb-2">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalfinance">
                                    <i class="fa-solid fa-plus"></i> New
                                </a>
                            </div> <!-- end of col -->
                        </div>
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
                                $ctr = 1;
                                while ($row = $tbl_finance_query->fetch_assoc()) {
                                    ?>
                                    <tbody>
                                        <tr class="text-center">
                                            <td><?= $ctr; ?></td>
                                            <td><?= $row["transaction_date"]; ?></td>
                                            <td><?= $row["transaction_type"]; ?></td>
                                            <td><?= isset($row["amount"]) ? $row["amount"] : ''; ?></td>
                                            <td><?= $row["description"]; ?></td>
                                            <td><?= $row["inputted_by"]; ?></td>
                                         
                                        </tr>
                                        <?php	
                                        $ctr++;	
                                      }
                                      ?>
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
                                    const revenueChart = new Chart(ctx1, {
                                        type: 'bar',
                                        data: {
                                            labels: <?php echo json_encode($labels); ?>,
                                            datasets: [{
                                                label: 'Total Revenue',
                                                data: <?php echo json_encode($totalAmounts); ?>,
                                                backgroundColor: 'rgba(75, 192, 192, 0.2)', // kulay ng chart
                                                borderColor: 'rgba(75, 192, 192, 1)', // kulay ng chart
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    const ctx2 = document.getElementById('transactionTypeChart').getContext('2d');
                                    const transactionTypeChart = new Chart(ctx2, {
                                        type: 'pie',
                                        data: {
                                            labels: <?php echo json_encode($pieLabels); ?>,
                                            datasets: [{
                                                label: 'Transaction Type',
                                                data: <?php echo json_encode($pieTotalAmounts); ?>,
                                                backgroundColor: <?php echo json_encode($typeColors); ?>,
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            plugins: {
                                                tooltip: {
                                                    callbacks: {
                                                        label: function(context) {
                                                            var label = context.label || '';
                                                            if (label) {
                                                                label += ': ';
                                                            }
                                                            if (context.parsed) {
                                                                label += context.parsed.toLocaleString() + ' (' + ((context.parsed / context.dataset.data.reduce((a, b) => a + b, 0)) * 100).toFixed(2) + '%)';
                                                            }
                                                            return label;
                                                        }
                                                    }
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
    