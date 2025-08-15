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





/* Wrapper */
.login-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 0;
}

/* Main Card */
.login-card {
    display: flex;
    width: 750px;
    height: 420px;
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    transition: transform 0.6s ease-in-out;
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
}

.login-image-panel h1 {
    font-size: 28px;
    margin-bottom: 10px;
}

.login-image-panel p {
    font-size: 16px;
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
    padding: 12px;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
    outline: none;
}

.login-form button,
.forgot-form button {
    width: 100%;
    padding: 12px;
    border: none;
    background: #0077b6;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.login-form button:hover,
.forgot-form button:hover {
    background: #023e8a;
}

/* Toggle Link */
.toggle-link {
    display: block;
    margin-top: 15px;
    text-align: center;
    color: #0077b6;
    cursor: pointer;
    font-size: 14px;
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



function flipLoginCard() {
    document.getElementById("loginCard").classList.toggle("flip");
}

// Optional: handle button clicks
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("loginBtn").addEventListener("click", () => {
        alert("Login logic goes here");
    });

    document.getElementById("resetBtn").addEventListener("click", () => {
        alert("Password reset logic goes here");
    });
});