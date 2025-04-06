<!-- filepath: c:\xampp\htdocs\wt_proj2\admin_dashboard.php -->
<?php
include 'db.php'; // Include the database connection file

session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/chart.js" defer></script>

</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <a href="login.html" class="logout-button">Logout</a>
    </header>
    <div class="container">
        <h2>Data Visualization</h2>
        <div class="graph-container">
            <div class="graph">
                <h3>Time-Series Graph</h3>
                <canvas id="timeSeriesGraph"></canvas>
            </div>
            <div class="graph">
                <h3>Pie Chart</h3>
                <canvas id="pieChart"></canvas>
            </div>
            <div class="graph">
                <h3>Bar Graph</h3>
                <canvas id="barGraph"></canvas>
            </div>
        </div>
    </div>
</body>
</html>