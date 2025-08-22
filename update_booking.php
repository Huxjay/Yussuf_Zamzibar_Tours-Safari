<?php
// update_booking.php
include 'includes/db.php'; // Database connection
include 'admin_send_email.php'; // Include the new email functions
session_start();

// Handle form submissions for tour and safari bookings
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['type'])) {
        $type = $_POST['type'];
        $status = isset($_POST['approve']) ? 'confirmed' : 'cancelled';
        
        if ($type === 'tour') {
            // Handle tour booking updates
            $id = $_POST['booking_id'];
            
            // Get booking details first
            $stmt = $conn->prepare("SELECT * FROM tourbookings WHERE booking_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $booking = $result->fetch_assoc();
            $stmt->close();
            
            if ($booking) {
                // Update the status
                if ($status === 'confirmed') {
                    $stmt = $conn->prepare("UPDATE tourbookings SET status = 'confirmed' WHERE booking_id = ?");
                } else {
                    $stmt = $conn->prepare("UPDATE tourbookings SET status = 'cancelled' WHERE booking_id = ?");
                }
                
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
                
                // Send email to customer
                $bookingDetails = [
                    'date' => $booking['tour_date'],
                    'people' => $booking['people'],
                    'tours' => $booking['selected_tours']
                ];
                
                sendTourStatusEmail($booking['email'], $booking['name'], $status, $bookingDetails);
                
                $_SESSION['message'] = "Tour booking updated and customer notified!";
                $_SESSION['message_type'] = "success";
            }
            
        } elseif ($type === 'safari') {
            // Handle safari booking updates
            $id = $_POST['id'];
            
            // Get booking details first
            $stmt = $conn->prepare("SELECT * FROM safaribookings WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $booking = $result->fetch_assoc();
            $stmt->close();
            
            if ($booking) {
                // Update the status
                if ($status === 'confirmed') {
                    $stmt = $conn->prepare("UPDATE safaribookings SET status = 'confirmed' WHERE id = ?");
                } else {
                    $stmt = $conn->prepare("UPDATE safaribookings SET status = 'cancelled' WHERE id = ?");
                }
                
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
                
                // Send email to customer
                $bookingDetails = [
                    'date' => $booking['safari_date'],
                    'people' => $booking['people'],
                    'safari' => $booking['selected_safari']
                ];
                
                sendSafariStatusEmail($booking['email'], $booking['name'], $status, $bookingDetails);
                
                $_SESSION['message'] = "Safari booking updated and customer notified!";
                $_SESSION['message_type'] = "success";
            }
        }
        
        // Redirect back to the admin page
        header("Location: admin.php?page=toursafari");
        exit();
    }
}

// If someone accesses this page directly without POST data, redirect them
header("Location: admin.php?page=toursafari");
exit();
?>