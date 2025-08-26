<?php
session_start();
include 'includes/db.php'; // Database connection

// Initialize variables
$error = '';
$email = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle login form
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Clean input
        $email = strtolower(trim($_POST['email']));
        $password = trim($_POST['password']);

        // Prepare statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE LOWER(TRIM(email)) = ?");
        if(!$stmt){
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['user_id'];   // correct column
    $_SESSION['username'] = $user['name'];     // correct column
    $_SESSION['role'] = $user['role'];

    if ($user['role'] === 'admin') {
        header("Location: admin.php");
        exit();
    } else {
        $error = "You do not have admin access.";
    }
} else {
                $error = "Invalid password. Please try again.";
            }
        } else {
            $error = "No account found with this email address.";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Yussuf Zanzibar</title>
    <style>
        /* Your existing CSS */
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

        /* Hide forgot form initially */
        .forgot-form {
            position: absolute;
            top: 40px;
            left: 0;
            width: 100%;
            opacity: 0;
            transform: translateX(100%);
        }

        /* Animation when flipped */
        .login-card.flip .login-form {
            opacity: 0;
            transform: translateX(-100%);
        }

        .login-card.flip .forgot-form {
            opacity: 1;
            transform: translateX(0);
        }

        /* Vibration effect for invalid input */
        @keyframes vibrate {
            0% { transform: translateX(0); }
            20% { transform: translateX(-3px); }
            40% { transform: translateX(3px); }
            60% { transform: translateX(-3px); }
            80% { transform: translateX(3px); }
            100% { transform: translateX(0); }
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
            animation: vibrate 0.3s linear;
        }

        .password-wrapper {
            position: relative;
            width: 100%;
        }

        .password-wrapper input {
            width: 100%;
            padding: 14px 40px 14px 14px; /* space for the icon */
            margin: 12px 0;
            border-radius: 10px;
            border: 1px solid #ccc;
            outline: none;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #0077b6;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .toggle-password:hover {
            color: #023e8a;
            transform: scale(1.2);
        }

        /* NEW: Error Popup Styles */
        .error-popup {
            position: fixed;
            top: 30px;
            right: 30px;
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 18px 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.4);
            z-index: 10000;
            display: flex;
            align-items: center;
            gap: 15px;
            transform: translateX(100%);
            opacity: 0;
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            max-width: 380px;
            border-left: 5px solid rgba(255, 255, 255, 0.3);
        }

        .error-popup.show {
            transform: translateX(0);
            opacity: 1;
        }

        .error-popup.hide {
            transform: translateX(100%);
            opacity: 0;
        }

        .error-icon {
            font-size: 24px;
            flex-shrink: 0;
        }

        .error-content {
            flex: 1;
        }

        .error-title {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .error-message {
            font-size: 14px;
            opacity: 0.9;
        }

        .error-close {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background 0.3s ease;
        }

        .error-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Shake animation for the form */
        @keyframes formShake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-8px); }
            20%, 40%, 60%, 80% { transform: translateX(8px); }
        }

        .form-shake {
            animation: formShake 0.6s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card" id="loginCard">
            <!-- Left Side (Image Panel) -->
            <div class="login-image-panel">
                <h1>Welcome Back</h1>
                <p>Log in to continue your journey</p>
            </div>

            <!-- Right Side (Forms) -->
            <div class="login-forms">
                <!-- Login Form -->
                <form class="form-container login-form active" method="POST" action="" id="loginForm">
                    <h2>Admin Login</h2>
                    <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required />
                    
                    <div class="password-wrapper">
                        <input type="password" name="password" id="passwordInput" placeholder="Password" required />
                        <span class="toggle-password" onclick="togglePassword()">👁</span>
                    </div>

                    <button type="submit">Login</button>
                    <!-- <span class="toggle-link" onclick="flipLoginCard()">Forgot Password?</span> -->
                </form>

                <!-- Forgot Password Form -->
                <div class="form-container forgot-form">
                    <h2>Forgot Password</h2>
                    <input type="email" placeholder="Enter your email" />
                    <button id="resetBtn">Reset Password</button>
                    <span class="toggle-link" onclick="flipLoginCard()">Back to Login</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Popup -->
    <div class="error-popup" id="errorPopup">
        <div class="error-icon">⚠</div>
        <div class="error-content">
            <div class="error-title">Login Failed</div>
            <div class="error-message" id="errorMessage"></div>
        </div>
        <button class="error-close" onclick="hideErrorPopup()">×</button>
    </div>

    <script>
        // Flip login card
        function flipLoginCard() {
            document.getElementById("loginCard").classList.toggle("flip");
        }

        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById("passwordInput");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        }

        // Show error popup
        function showErrorPopup(message) {
            const popup = document.getElementById("errorPopup");
            const messageElement = document.getElementById("errorMessage");
            const loginForm = document.getElementById("loginForm");
            
            // Set error message
            messageElement.textContent = message;
            
            // Show popup
            popup.classList.remove("hide");
            popup.classList.add("show");
            
            // Shake the form for additional feedback
            loginForm.classList.add("form-shake");
            setTimeout(() => {
                loginForm.classList.remove("form-shake");
            }, 600);
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                hideErrorPopup();
            }, 5000);
        }

        // Hide error popup
        function hideErrorPopup() {
            const popup = document.getElementById("errorPopup");
            popup.classList.remove("show");
            popup.classList.add("hide");
        }

        // Show error message if exists
        <?php if (!empty($error)): ?>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                showErrorPopup('<?php echo $error; ?>');
            }, 800);
        });
        <?php endif; ?>

        // Close popup when clicking outside (optional)
        document.addEventListener('click', function(event) {
            const popup = document.getElementById('errorPopup');
            if (popup.classList.contains('show') && !popup.contains(event.target)) {
                hideErrorPopup();
            }
        });
    </script>
</body>
</html>