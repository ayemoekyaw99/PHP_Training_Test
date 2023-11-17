<?php
require_once 'database.php';
$interval = isset($_GET['interval']) ? $_GET['interval'] : 'yearly';
// Handle button clicks and set the interval
if (isset($_POST['weekly'])) {
    $interval = 'weekly';
} elseif (isset($_POST['monthly'])) {
    $interval = 'monthly';
} elseif (isset($_POST['yearly'])) {
    $interval = 'yearly';
}
// Query the database based on the selected interval
$sql = "";
if ($interval === "weekly") {
    $sql = "SELECT DATE_FORMAT(created_at, '%Y-%u') as date, COUNT(title) as views FROM posts GROUP BY date";
} elseif ($interval === "yearly") {
    $sql = "SELECT YEAR(created_at) as date, COUNT(title) as views FROM posts GROUP BY date";
} elseif ($interval === "monthly") {
    $sql = "SELECT DATE_FORMAT(created_at, '%Y-%m') as date, COUNT(title) as views FROM posts GROUP BY date";
}
$result = $conn->query($sql);
// Prepare data for the chart
$labels = [];
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['date'];
        $data[] = $row['views'];
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Post Date Analysis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
   crossorigin="anonymous">
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container mt-5">
    <div class="col-12">
        <a href="index.php" class="btn btn-secondary">Back</a>
        <form id="chart-type" class="col-4 offset-8" method="post" action="">
          <button type="submit" class="btn btn-outline-secondary " value="Weekly" name="weekly">Weekly</button>
          <button type="submit" class="btn btn-outline-secondary " value="Monthly" name="monthly">Monthly</button>
          <button type="submit" class="btn btn-outline-secondary active" value="Yearly" name="yearly">Yearly</button>
        </form>
        <div>
          <canvas id="myChart"></canvas>
        </div>
    </div>
  </div>
  <script>
       const ctx = document.getElementById('myChart').getContext('2d');
       new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: '#of Posts',
                    data: <?php echo json_encode($data); ?>,
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
    </script>
</body>
</html>