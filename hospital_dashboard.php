<?php
session_start();
include 'db.php';

if ($_SESSION['user_type'] !== 'hospital') {
    header('Location: login.php');
    exit();
}

$hospital_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $disease = $_POST['disease'];

    $query = "INSERT INTO patients (hospital_id, name, age, disease) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('isis', $hospital_id, $name, $age, $disease);
    $stmt->execute();

    echo "Patient data has been entered successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Hospital Dashboard</h1>
        <a href="login.html" class="logout-button">Logout</a>
    </header>
    <div class="container">
        <h2>Enter Patient Details</h2>
        <form action="hospital_dashboard.php" method="POST">
            <label for="name">Patient Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <label for="disease">Disease:</label>
            <input type="text" id="disease" name="disease" required>

            <button type="submit">Submit</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2025 Healthcare System. All rights reserved.</p>
    </footer>
</body>
</html>