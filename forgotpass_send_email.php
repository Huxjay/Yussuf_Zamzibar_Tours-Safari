<?php
// forgotpass_send_email.php
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Send Password Reset Email
 */
function sendPasswordResetEmail($email, $name, $resetToken) {
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
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = "Password Reset Request - Yussuf Zanzibar";
        
        $resetLink = "http://" . $_SERVER['HTTP_HOST'] . "/reset_password.php?token=" . urlencode($resetToken);
        
        $body = "
            <h3>Dear $name,</h3>
            <p>We received a request to reset your password for your Yussuf Zanzibar account.</p>
            <p>Click the button below to reset your password:</p>
            <p style='text-align: center; margin: 30px 0;'>
                <a href='$resetLink' style='background: #0077b6; color: white; padding: 15px 30px; text-decoration: none; border-radius: 10px; display: inline-block;'>
                    Reset Password
                </a>
            </p>
            <p>Or copy and paste this link in your browser:<br>
            <code style='background: #f8f9fa; padding: 10px; border-radius: 5px;'>$resetLink</code></p>
            <p>This link will expire in 1 hour for security reasons.</p>
            <p>If you didn't request a password reset, please ignore this email.</p>
            <br>
            <p>Best regards,<br>Yussuf Zanzibar Tour & Safari Team</p>
        ";

        $mail->Body = $body;
        $mail->send();
        return true;

    } catch (Exception $e) {
        error_log("Password Reset Email Error: " . $mail->ErrorInfo);
        return false;
    }
}
?>