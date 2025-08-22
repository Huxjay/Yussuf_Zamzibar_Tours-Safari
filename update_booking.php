


<?php
// update_booking.php
include 'includes/db.php'; // Database connection
session_start();

// Handle form submissions for tour and safari bookings
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['type'])) {
        $type = $_POST['type'];
        
        if ($type === 'tour') {
            // Handle tour booking updates
            $id = $_POST['booking_id'];
            
            if (isset($_POST['approve'])) {
                $stmt = $conn->prepare("UPDATE tourbookings SET status = 'confirmed' WHERE booking_id = ?");
            } elseif (isset($_POST['cancel'])) {
                $stmt = $conn->prepare("UPDATE tourbookings SET status = 'cancelled' WHERE booking_id = ?");
            }
            
            if (isset($stmt)) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
                
                $_SESSION['message'] = "Tour booking updated successfully!";
                $_SESSION['message_type'] = "success";
            }
            
        } elseif ($type === 'safari') {
            // Handle safari booking updates
            $id = $_POST['id'];
            
            if (isset($_POST['approve'])) {
                $stmt = $conn->prepare("UPDATE safaribookings SET status = 'confirmed' WHERE id = ?");
            } elseif (isset($_POST['cancel'])) {
                $stmt = $conn->prepare("UPDATE safaribookings SET status = 'cancelled' WHERE id = ?");
            }
            
            if (isset($stmt)) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
                
                $_SESSION['message'] = "Safari booking updated successfully!";
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