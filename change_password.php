
  <style>
   
    .change-password-box {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
      width: 350px;
      position: relative;
    }
    .change-password-box h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    .change-password-box input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .change-password-box button {
      width: 100%;
      padding: 12px;
      background: #0077b6;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }
    .change-password-box button:hover {
      background: #005f86;
    }

    /* Popup styles */
    .popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.7);
      background: white;
      padding: 25px 30px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      text-align: center;
      z-index: 1000;
      opacity: 0;
      transition: all 0.4s ease-in-out;
    }
    .popup.show {
      opacity: 1;
      transform: translate(-50%, -50%) scale(1);
    }
    .popup.success { border-left: 5px solid #28a745; }
    .popup.error   { border-left: 5px solid #dc3545; }
    .popup h3 { margin: 0 0 10px; }
    .popup button {
      margin-top: 10px;
      background: #0077b6;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 8px;
      cursor: pointer;
    }
    .popup button:hover { background: #005f86; }
  </style>
</head>
<body>
  <div class="change-password-box">
    <h2>Change Password</h2>
    <form action="update_password.php" method="POST">
      <input type="password" name="old_password" placeholder="Current Password" required>
      <input type="password" name="new_password" placeholder="New Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
      <button type="submit">Update Password</button>
    </form>
  </div>

  <?php if(isset($_GET['message'])): ?>
    <div id="popup" class="popup <?php echo ($_GET['status'] ?? '') ?>">
      <h3><?php echo ($_GET['status'] === 'success') ? "✅ Success" : "⚠ Error"; ?></h3>
      <p><?php echo htmlspecialchars($_GET['message']); ?></p>
      <button onclick="closePopup()">OK</button>
    </div>
    <script>
      const popup = document.getElementById("popup");
      popup.classList.add("show");

      function closePopup(){
        popup.classList.remove("show");
        <?php if(($_GET['status'] ?? '') === 'success'): ?>
          // If success, redirect from inside admin.php back to login
          setTimeout(() => { window.location.href = "index.php?page=login.php"; }, 300);
        <?php endif; ?>
      }
    </script>
<?php endif; ?>