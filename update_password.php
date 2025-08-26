<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch current password
    $stmt = $conn->prepare("SELECT password FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if (!$user) {
        header("Location: admin.php?page=change_password&status=error&message=User not found");
        exit();
    }

    // Verify old password
    if (!password_verify($old_password, $user['password'])) {
        header("Location: admin.php?page=change_password&status=error&message=Incorrect current password");
        exit();
    }

    // Match new + confirm
    if ($new_password !== $confirm_password) {
        header("Location: admin.php?page=change_password&status=error&message=New passwords do not match");
        exit();
    }

    // Update password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
    $stmt->bind_param("si", $hashed_password, $user_id);

    if ($stmt->execute()) {
        // Destroy session & force re-login
        session_destroy();
        header("Location: admin.php?page=change_password&status=success&message=Password updated successfully, please log in again");
        exit();
    } else {
        header("Location: admin.php?page=change_password&status=error&message=Failed to update password");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>