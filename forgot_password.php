<?php
// forgot_password.php
include 'includes/db.php';
include 'forgotpass_send_email.php'; // Include the email function

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['forgot_email'])) {
    $email = strtolower(trim($_POST['forgot_email']));
    
    // Check if email exists
    $stmt = $conn->prepare("SELECT id, username FROM users WHERE LOWER(TRIM(email)) = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Generate reset token
        $resetToken = bin2hex(random_bytes(32));
        $expiryTime = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        // Store token in database
        $updateStmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE id = ?");
        $updateStmt->bind_param("ssi", $resetToken, $expiryTime, $user['id']);
        
        if ($updateStmt->execute()) {
            // Send email
            if (sendPasswordResetEmail($email, $user['username'], $resetToken)) {
                $success = "Password reset instructions have been sent to your email.";
            } else {
                $error = "Failed to send email. Please try again later.";
            }
        } else {
            $error = "Error processing your request. Please try again.";
        }
        
        $updateStmt->close();
    } else {
        // For security, don't reveal if email exists or not
        $success = "If an account with that email exists, password reset instructions have been sent.";
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Yussuf Zanzibar</title>
    <style>
        /* Your existing CSS styles */
        /* Wrapper */
        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #caf0f8, #90e0ef);
            animation: backgroundFloat 15s ease-in-out infinite alternate;
        }

        /* Floating animation for background */
        @keyframes backgroundFloat {
            0% { background-position: 0 0; }
            100% { background-position: 100px 100px; }
        }

        /* Main Card */
        .login-card {
            display: flex;
            width: 750px;
            height: 420px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            transform-style: preserve-3d;
            transition: transform 0.8s cubic-bezier(0.68,-0.55,0.265,1.55);
            animation: floatCard 6s ease-in-out infinite alternate;
        }

        /* Floating card animation */
        @keyframes floatCard {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        /* Image Panel */
        .login-image-panel {
            flex: 1;
            background: linear-gradient(135deg, #023e8a, #0077b6);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .login-image-panel:hover {
            transform: scale(1.05) rotateZ(1deg);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }

        .login-image-panel h1 {
            font-size: 32px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.4);
        }

        .login-image-panel p {
            font-size: 16px;
            opacity: 0.9;
        }

        /* Forms Container */
        .login-forms {
            flex: 1;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        /* Forms */
        .form-container {
            width: 100%;
            transition: transform 0.5s ease, opacity 0.5s ease;
        }

        .login-form input,
        .forgot-form input {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            border-radius: 10px;
            border: 1px solid #ccc;
            outline: none;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .login-form input:focus,
        .forgot-form input:focus {
            box-shadow: 0 5px 15px rgba(0,123,255,0.4);
            transform: translateY(-2px);
        }

        .login-form button,
        .forgot-form button {
            width: 100%;
            padding: 14px;
            border: none;
            background: #0077b6;
            color: white;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .login-form button:hover,
        .forgot-form button:hover {
            background: #023e8a;
            transform: scale(1.05) rotateZ(1deg);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        /* Toggle Link */
        .toggle-link {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #0077b6;
            cursor: pointer;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .toggle-link:hover {
            color: #023e8a;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.3);
        }

        /* Success message */
        .success {
            color: #27ae60;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            background: #d5f4e6;
            border-radius: 8px;
            border: 1px solid #2ecc71;
        }

        /* Error message */
        .error {
            color: #e74c3c;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            background: #fadbd8;
            border-radius: 8px;
            border: 1px solid #e74c3c;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <!-- Left Side (Image Panel) -->
            <div class="login-image-panel">
                <h1>Reset Password</h1>
                <p>Enter your email to receive reset instructions</p>
            </div>

            <!-- Right Side (Form) -->
            <div class="login-forms">
                <!-- Forgot Password Form -->
                <form class="form-container" method="POST" action="forgot_password.php">
                    <h2>Forgot Password</h2>
                    
                    <?php if (!empty($success)): ?>
                        <div class="success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if (!empty($error)): ?>
                        <div class="error"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <p style="margin-bottom: 20px; color: #7f8c8d; font-size: 14px;">
                        Enter your email address and we'll send you instructions to reset your password.
                    </p>
                    
                    <input type="email" name="forgot_email" placeholder="Enter your email" required />
                    <button type="submit">Send Reset Instructions</button>
                    <span class="toggle-link" onclick="window.location.href='login.php'">Back to Login</span>
                </form>
            </div>
        </div>
    </div>
</body>
</html>