<?php
// admin_send_email.php
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * ✅ Send Tour Approval/Rejection Email to Customer
 */
function sendTourStatusEmail($customerEmail, $customerName, $status, $bookingDetails) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'husseinjuma0097@gmail.com';
        $mail->Password   = 'iqmh vsgu ulph cwnr';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('yussufzanzibar611@gmail.com', 'Yussuf Zanzibar Tour & Safari');
        $mail->addAddress($customerEmail, $customerName);
        $mail->isHTML(true);
        
        if ($status === 'confirmed') {
            $mail->Subject = "✅ Tour Booking Confirmed - Yussuf Zanzibar";
            $body = "<h3>Dear $customerName,</h3>";
            $body .= "<p>We are pleased to inform you that your tour booking has been <strong>confirmed</strong>!</p>";
            $body .= "<h4>Booking Details:</h4>";
            $body .= "<ul>
                        <li><b>Tour Date:</b> {$bookingDetails['date']}</li>
                        <li><b>Number of People:</b> {$bookingDetails['people']}</li>
                        <li><b>Selected Tours:</b> {$bookingDetails['tours']}</li>
                      </ul>";
            $body .= "<p>Our team will contact you shortly to finalize the details.</p>";
            $body .= "<p>Thank you for choosing Yussuf Zanzibar Tour & Safari!</p>";
        } else {
            $mail->Subject = "❌ Tour Booking Cancelled - Yussuf Zanzibar";
            $body = "<h3>Dear $customerName,</h3>";
            $body .= "<p>We regret to inform you that your tour booking has been <strong>cancelled</strong>.</p>";
            $body .= "<p>If you believe this is a mistake or have any questions, please contact us immediately.</p>";
            $body .= "<p>Phone: +255714221365</p>";
            $body .= "<p>Email:yussufzanzibar611@gmail.com</p>";
        }
        
        $body .= "<br><p>Best regards,<br>Yussuf Zanzibar Tour & Safari Team</p>";

        $mail->Body = $body;
        $mail->send();
        return true;

    } catch (Exception $e) {
        error_log("Email Error (Tour Status): " . $mail->ErrorInfo);
        return false;
    }
}

/**
 * ✅ Send Safari Approval/Rejection Email to Customer
 */
function sendSafariStatusEmail($customerEmail, $customerName, $status, $bookingDetails) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'husseinjuma0097@gmail.com';
        $mail->Password   = 'iqmh vsgu ulph cwnr';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('yussufzanzibar611@gmail.com', 'Yussuf Zanzibar Tour & Safari');
        $mail->addAddress($customerEmail, $customerName);
        $mail->isHTML(true);
        
        if ($status === 'confirmed') {
            $mail->Subject = "✅ Safari Booking Confirmed - Yussuf Zanzibar";
            $body = "<h3>Dear $customerName,</h3>";
            $body .= "<p>We are pleased to inform you that your safari booking has been <strong>confirmed</strong>!</p>";
            $body .= "<h4>Booking Details:</h4>";
            $body .= "<ul>
                        <li><b>Safari Date:</b> {$bookingDetails['date']}</li>
                        <li><b>Number of People:</b> {$bookingDetails['people']}</li>
                        <li><b>Selected Safari:</b> {$bookingDetails['safari']}</li>
                      </ul>";
            $body .= "<p>Our team will contact you shortly to finalize the details.</p>";
            $body .= "<p>Thank you for choosing Yussuf Zanzibar Tour & Safari!</p>";
        } else {
            $mail->Subject = "❌ Safari Booking Cancelled - Yussuf Zanzibar";
            $body = "<h3>Dear $customerName,</h3>";
            $body .= "<p>We regret to inform you that your safari booking has been <strong>cancelled</strong>.</p>";
            $body .= "<p>If you believe this is a mistake or have any questions, please contact us immediately.</p>";
            $body .= "<p>Phone: +255714221365</p>";
            $body .= "<p>Email: yussufzanzibar611@gmail.com</p>";
        }
        
        $body .= "<br><p>Best regards,<br>Yussuf Zanzibar Tour & Safari Team</p>";

        $mail->Body = $body;
        $mail->send();
        return true;

    } catch (Exception $e) {
        error_log("Email Error (Safari Status): " . $mail->ErrorInfo);
        return false;
    }
}

/**
 * ✅ Send Transport Approval/Rejection Email to Customer
 */
function sendTransportStatusEmail($customerEmail, $customerName, $status, $bookingDetails) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'husseinjuma0097@gmail.com';
        $mail->Password   = 'iqmh vsgu ulph cwnr';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('yussufzanzibar611@gmail.com', 'Yussuf Zanzibar Tour & Safari');
        $mail->addAddress($customerEmail, $customerName);
        $mail->isHTML(true);
        
        if ($status === 'confirmed') {
            $mail->Subject = "✅ Transport Booking Confirmed - Yussuf Zanzibar";
            $body = "<h3>Dear $customerName,</h3>";
            $body .= "<p>We are pleased to inform you that your transport booking has been <strong>confirmed</strong>!</p>";
            $body .= "<h4>Booking Details:</h4>";
            $body .= "<ul>
                        <li><b>Pickup:</b> {$bookingDetails['pickup']}</li>
                        <li><b>Dropoff:</b> {$bookingDetails['dropoff']}</li>
                        <li><b>Date:</b> {$bookingDetails['date']}</li>
                        <li><b>Time:</b> {$bookingDetails['time']}</li>
                      </ul>";
            $body .= "<p>Our driver will contact you before the scheduled time.</p>";
            $body .= "<p>Thank you for choosing Yussuf Zanzibar Tour & Safari!</p>";
        } else {
            $mail->Subject = "❌ Transport Booking Cancelled - Yussuf Zanzibar";
            $body = "<h3>Dear $customerName,</h3>";
            $body .= "<p>We regret to inform you that your transport booking has been <strong>cancelled</strong>.</p>";
            $body .= "<p>If you believe this is a mistake or have any questions, please contact us immediately.</p>";
            $body .= "<p>Phone: +255714221365</p>";
            $body .= "<p>Email: yussufzanzibar611@gmail.com</p>";
        }
        
        $body .= "<br><p>Best regards,<br>Yussuf Zanzibar Tour & Safari Team</p>";

        $mail->Body = $body;
        $mail->send();
        return true;

    } catch (Exception $e) {
        error_log("Email Error (Transport Status): " . $mail->ErrorInfo);
        return false;
    }
}
?>