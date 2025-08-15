<?php
include 'includes/db.php';

// Fetch all users
$result = $conn->query("SELECT user_id, password FROM users");
while ($user = $result->fetch_assoc()) {
    $hashedPassword = password_hash($user['password'], PASSWORD_DEFAULT);
    $conn->query("UPDATE users SET password = '$hashedPassword' WHERE user_id = {$user['user_id']}");
}

echo "Passwords updated successfully.";
$conn->close();
?>
