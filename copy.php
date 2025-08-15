<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Login / Forgot Password</title>
<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #00b4d8, #0077b6);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-container {
        width: 350px;
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        position: relative;
        transition: transform 0.5s ease;
    }

    .form-container {
        padding: 30px;
        transition: opacity 0.5s ease;
    }

    h2 {
        margin: 0 0 20px 0;
        font-size: 24px;
        text-align: center;
    }

    input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ccc;
        outline: none;
    }

    button {
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

    button:hover {
        background: #023e8a;
    }

    .toggle-link {
        display: block;
        margin-top: 15px;
        text-align: center;
        color: #0077b6;
        cursor: pointer;
        font-size: 14px;
    }

    /* Animation for slide */
    .card-container.flip .login-form {
        display: none;
    }

    .card-container.flip .forgot-form {
        display: block;
    }

    .forgot-form {
        display: none;
    }
</style>
</head>
<body>

<div class="card-container" id="cardContainer">

    <!-- Login Form -->
    <div class="form-container login-form">
        <h2>Login</h2>
        <input type="email" placeholder="Email" />
        <input type="password" placeholder="Password" />
        <button>Login</button>
        <span class="toggle-link" onclick="flipCard()">Forgot Password?</span>
    </div>

    <!-- Forgot Password Form -->
    <div class="form-container forgot-form">
        <h2>Forgot Password</h2>
        <input type="email" placeholder="Enter your email" />
        <button>Reset Password</button>
        <span class="toggle-link" onclick="flipCard()">Back to Login</span>
    </div>

</div>

<script>
    function flipCard() {
        document.getElementById('cardContainer').classList.toggle('flip');
    }
</script>

</body>
</html>