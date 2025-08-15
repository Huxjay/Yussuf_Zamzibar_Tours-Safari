<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Simple check (replace with DB check)
    if ($username === "admin" && $password === "1234") {
        $_SESSION['user'] = $username;
        echo "<script>alert('Login successful!');</script>";
        exit();
    } else {
        echo "<div class='error'>Invalid username or password.</div>";
    }
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
            <div class="form-container login-form">
                <h2>Login</h2>
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button id="loginBtn">Login</button>
                <span class="toggle-link" onclick="flipLoginCard()">Forgot Password?</span>
            </div>

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