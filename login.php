<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user is an admin
    $query = "SELECT * FROM admin WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && $password == $admin['password']) {
        $_SESSION['user_type'] = 'admin';
        $_SESSION['user_id'] = $admin['id'];
        header('Location: admin_dashboard.php');
        exit();
    }

    // Check if the user is a hospital
    $query = "SELECT * FROM hospitals WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $hospital = $result->fetch_assoc();

    if ($hospital && $password == $hospital['password']) {
        $_SESSION['user_type'] = 'hospital';
        $_SESSION['user_id'] = $hospital['id'];
        header('Location: hospital_dashboard.php');
        exit();
    }

    echo "Invalid credentials!";
}
?>