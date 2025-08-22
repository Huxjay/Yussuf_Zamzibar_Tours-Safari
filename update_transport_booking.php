<?php
// transport_save.php or update_transport_booking.php
include 'includes/db.php'; // Database connection
include 'admin_send_email.php'; // Include the new email functions

if (isset($_POST['type']) && $_POST['type'] === 'transport') {
    $id = $_POST['id'];
    
    // Get booking details first
    $stmt = $conn->prepare("SELECT * FROM transport_booking WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();
    $stmt->close();
    
    if ($booking) {
        if (isset($_POST['approve'])) {
            $stmt = $conn->prepare("UPDATE transport_booking SET status = 'confirmed' WHERE id = ?");
            $status = 'confirmed';
        } elseif (isset($_POST['cancel'])) {
            $stmt = $conn->prepare("UPDATE transport_booking SET status = 'cancelled' WHERE id = ?");
            $status = 'cancelled';
        }
        
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        
        // Send email to customer
        $bookingDetails = [
            'pickup' => $booking['pickup'],
            'dropoff' => $booking['dropoff'],
            'date' => $booking['date'],
            'time' => $booking['time']
        ];
        
        sendTransportStatusEmail($booking['email'], $booking['name'], $status, $bookingDetails);
        
        $_SESSION['message'] = "Transport booking updated and customer notified!";
        $_SESSION['message_type'] = "success";
    }
    
    header("Location: admin.php?page=transfer_admin_side");
    exit();
}
?>