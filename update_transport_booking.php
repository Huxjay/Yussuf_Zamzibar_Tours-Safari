<?php
// transport_save.php
include 'includes/db.php'; // Database connection

// In  update_booking.php file, add this case:
if (isset($_POST['type']) && $_POST['type'] === 'transport') {
    $id = $_POST['id'];
    
    if (isset($_POST['approve'])) {
        $stmt = $conn->prepare("UPDATE transport_booking SET status = 'confirmed' WHERE id = ?");
    } elseif (isset($_POST['cancel'])) {
        $stmt = $conn->prepare("UPDATE transport_booking SET status = 'cancelled' WHERE id = ?");
    }
    
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    
    header("Location: admin.php?page=transfer_admin_side");
    exit();
}

?>