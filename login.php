<?php
session_start();
include 'includes/db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: admin.php");
                exit();
            } else {
                $error = "You do not have admin access.";
            }
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found. (Debug: email='$email')";
    }

    $stmt->close();
    $conn->close();
}
?>

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
            <form class="form-container login-form" method="POST" action="">
                <h2>Login</h2>

                <?php if(isset($error)) { echo "<div class='error'>{$error}</div>"; } ?>

                <input type="email" name="email" placeholder="Email" required />
                
                <div class="password-wrapper">
                    <input type="password" name="password" id="passwordInput" placeholder="Password" required />
                    <span class="toggle-password" onclick="togglePassword()">👁</span>
                </div>

                <button type="submit">Login</button>
                <span class="toggle-link" onclick="flipLoginCard()">Forgot Password?</span>
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
</script>