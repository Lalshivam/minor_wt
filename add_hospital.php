<!-- filepath: c:\xampp\htdocs\wt_proj2\add_hospital.php -->
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO hospitals (name, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $name, $username, $password);
    if ($stmt->execute()) {
        $success_message = "Hospital added successfully!";
    } else {
        $error_message = "Error adding hospital: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Hospital</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Add New Hospital</h1>
        <a href="admin_dashboard.php" class="logout-button">Back to Dashboard</a>
    </header>
    <div class="container">
        <h2>Add Hospital</h2>
        <?php if (isset($success_message)) echo "<p class='success'>$success_message</p>"; ?>
        <?php if (isset($error_message)) echo "<p class='error'>$error_message</p>"; ?>
        <form action="add_hospital.php" method="POST">
            <label for="name">Hospital Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="add-hospital-button">Add Hospital</button>
        </form>
    </div>
</body>
</html>