<?php
// delete_booking.php
include 'includes/db.php';
session_start();

// Ensure it's a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request.");
}

// Validate inputs
if (!isset($_POST['type']) || empty($_POST['type'])) {
    die("Missing booking type.");
}

$type = $_POST['type'];

// Determine ID column + table
if ($type === 'tour') {
    if (!isset($_POST['booking_id'])) die("Missing booking ID.");
    $id    = intval($_POST['booking_id']);
    $table = "tourbookings";
    $idCol = "booking_id";
} elseif ($type === 'safari') {
    if (!isset($_POST['id'])) die("Missing booking ID.");
    $id    = intval($_POST['id']);
    $table = "safaribookings";
    $idCol = "id";
} elseif ($type === 'transport') {
    if (!isset($_POST['id'])) die("Missing booking ID.");
    $id    = intval($_POST['id']);
    $table = "transport_booking";
    $idCol = "id";
} else {
    die("Invalid booking type.");
}

// First check if booking exists
$stmt = $conn->prepare("SELECT * FROM $table WHERE $idCol = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $stmt->close();
    $_SESSION['message'] = ucfirst($type) . " booking not found.";
    // Redirect based on type
    if ($type === 'transport') {
        header("Location: admin.php?page=transfer_admin_side");
    } else {
        header("Location: admin.php?page=toursafari");
    }
    exit();
}
$stmt->close();

// Perform delete
$stmt = $conn->prepare("DELETE FROM $table WHERE $idCol = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['message'] = ucfirst($type) . " booking deleted successfully.";
} else {
    $_SESSION['message'] = "Error deleting booking: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Redirect back
if ($type === 'transport') {
    header("Location: admin.php?page=transfer_admin_side");
} else {
    header("Location: admin.php?page=toursafari");
}
exit();
?>