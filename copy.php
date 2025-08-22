i have done with this one that will send the email to the admin that there is someone make the booking now its time for admin to send email for them
when he clicked confirm or cancelled button 

this is what i was used when i send email to admin 

<?php
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * 📩 Send Safari Booking Notification
 */
function sendSafariBookingEmail($adminEmail, $bookingData, $toursList) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'husseinjuma0097@gmail.com';
        $mail->Password   = 'iqmh vsgu ulph cwnr';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('husseinjuma0097@gmail.com', 'Yussuf Zanzibar Tour & Safari');
        $mail->addAddress($adminEmail, 'Admin');
        $mail->isHTML(true);
        $mail->Subject = "📩 New Safari Booking - " . $bookingData['name'];

        // Ensure safari is always an array
        $safariArray = !empty($bookingData['safari']) ? (array) $bookingData['safari'] : [];
        $safariNames = [];
        foreach ($safariArray as $slug) {
            if (array_key_exists($slug, $toursList)) {
                $safariNames[] = $toursList[$slug];
            }
        }

        $body  = "<h3>New Safari Booking Received</h3>";
        $body .= "<ul>
                    <li><b>Name:</b> {$bookingData['name']}</li>
                    <li><b>Email:</b> {$bookingData['email']}</li>
                    <li><b>WhatsApp:</b> {$bookingData['whatsapp']}</li>
                    <li><b>Tour Date:</b> {$bookingData['date']}</li>
                    <li><b>Number of People:</b> {$bookingData['people']}</li>
                    <li><b>Special Requests:</b> {$bookingData['requests']}</li>
                  </ul>";
        $body .= "<p><strong>Selected Safaris:</strong></p><ul>";
        if (!empty($safariNames)) {
            foreach ($safariNames as $safari) {
                $body .= "<li>$safari</li>";
            }
        } else {
            $body .= "<li>None selected</li>";
        }
        $body .= "</ul>";

        $mail->Body = $body;
        $mail->send();
        return true;

    } catch (Exception $e) {
        echo "<pre>Email Error (Safari): " . $mail->ErrorInfo . "</pre>";
        return false;
    }
}

/**
 * 📩 Send Tour Booking Notification
 */
function sendTourBookingEmail($adminEmail, $bookingData, $toursList) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'husseinjuma0097@gmail.com';
        $mail->Password   = 'iqmh vsgu ulph cwnr';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('husseinjuma0097@gmail.com', 'Yussuf Zanzibar Tour & Safari');
        $mail->addAddress($adminEmail, 'Admin');
        $mail->isHTML(true);
        $mail->Subject = "📩 New Tour Booking - " . $bookingData['name'];

        // Ensure tours is always an array
        $toursArray = !empty($bookingData['tours']) ? (array) $bookingData['tours'] : [];
        $tourNames = [];
        foreach ($toursArray as $slug) {
            if (array_key_exists($slug, $toursList)) {
                $tourNames[] = $toursList[$slug];
            }
        }

        $body  = "<h3>New Tour Booking Received</h3>";
        $body .= "<ul>
                    <li><b>Name:</b> {$bookingData['name']}</li>
                    <li><b>Email:</b> {$bookingData['email']}</li>
                    <li><b>WhatsApp:</b> {$bookingData['whatsapp']}</li>
                    <li><b>Date:</b> {$bookingData['date']}</li>
                    <li><b>People:</b> {$bookingData['people']}</li>
                    <li><b>Preferences:</b> {$bookingData['preferences']}</li>
                  </ul>";
        $body .= "<p><strong>Selected Tours:</strong></p><ul>";
        if (!empty($tourNames)) {
            foreach ($tourNames as $tour) {
                $body .= "<li>$tour</li>";
            }
        } else {
            $body .= "<li>None selected</li>";
        }
        $body .= "</ul>";

        $mail->Body = $body;
        $mail->send();
        return true;

    } catch (Exception $e) {
        echo "<pre>Email Error (Tour): " . $mail->ErrorInfo . "</pre>";
        return false;
    }
}

/**
 * 🚖 Send Transfer Booking Notification
 */
function sendTransferBookingEmail($adminEmail, $bookingData) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'husseinjuma0097@gmail.com';
        $mail->Password   = 'iqmh vsgu ulph cwnr';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('husseinjuma0097@gmail.com', 'Yussuf Zanzibar Tour & Safari');
        $mail->addAddress($adminEmail, 'Admin');
        $mail->isHTML(true);
        $mail->Subject = "🚖 New Transfer Booking - " . $bookingData['name'];

        $body  = "<h3>New Transfer Booking</h3>";
        $body .= "<ul>
                    <li><b>Name:</b> {$bookingData['name']}</li>
                    <li><b>Email:</b> {$bookingData['email']}</li>
                    <li><b>Phone:</b> {$bookingData['phone']}</li>
                    <li><b>Pickup:</b> {$bookingData['pickup']}</li>
                    <li><b>Dropoff:</b> {$bookingData['dropoff']}</li>
                    <li><b>Date:</b> {$bookingData['date']}</li>
                    <li><b>Time:</b> {$bookingData['time']}</li>
                  </ul>";

        $mail->Body = $body;
        $mail->send();
        return true;

    } catch (Exception $e) {
        echo "<pre>Email Error (Transfer): " . $mail->ErrorInfo . "</pre>";
        return false;
    }
}
?>



now we have to do vice versa admin to customers 

thia is example fomirmation for transprt part 



update_transport_booking.php

<?php

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
