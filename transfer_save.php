<?php
// transfer_save.php
include 'includes/db.php';   // Database connection
include 'send_email.php';    // Email notification function

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $pickup  = $_POST['pickup'];
    $dropoff = $_POST['dropoff'];
    $date    = $_POST['date'];
    $time    = $_POST['time'];

    $sql = "INSERT INTO transport_booking (name, email, phone, pickup_location, dropoff_location, booking_date, booking_time) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $email, $phone, $pickup, $dropoff, $date, $time);

    if ($stmt->execute()) {
        // ✅ Send Email Notification to Admin
        $adminEmail = "husseinjuma0097@gmail.com"; // Change to preferred admin email

        $bookingData = [
            'name'    => $name,
            'email'   => $email,
            'phone'   => $phone,
            'pickup'  => $pickup,
            'dropoff' => $dropoff,
            'date'    => $date,
            'time'    => $time
        ];

        sendTransferBookingEmail($adminEmail, $bookingData); 
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <title>Transfer Booking Success</title>
          <style>
            /* Popup background */
            .popup {
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background: rgba(0,0,0,0.5);
              display: flex;
              justify-content: center;
              align-items: center;
              z-index: 9999;
            }
            /* Popup box */
            .popup-content {
              background: #fff;
              padding: 30px;
              border-radius: 15px;
              text-align: center;
              width: 350px;
              box-shadow: 0 10px 25px rgba(0,0,0,0.3);
              animation: popIn 0.4s ease forwards;
            }
            @keyframes popIn {
              0% { transform: scale(0.5); opacity: 0; }
              100% { transform: scale(1); opacity: 1; }
            }
            .popup-content h2 {
              margin-bottom: 10px;
              color: #2ecc71;
            }
            .popup-content p {
              margin-bottom: 20px;
              font-size: 16px;
              color: #555;
            }
            .popup-content button {
              background: #2ecc71;
              color: #fff;
              border: none;
              padding: 10px 20px;
              border-radius: 8px;
              cursor: pointer;
              font-size: 14px;
              transition: 0.3s;
            }
            .popup-content button:hover {
              background: #27ae60;
            }
          </style>
        </head>
        <body>
          <!-- Popup -->
          <div id="success-popup" class="popup">
            <div class="popup-content">
              <h2>✅ Transfer Booked</h2>
              <p>Your transfer has been booked successfully! We'll confirm your booking shortly.</p>
              <button onclick="closePopup()">OK</button>
            </div>
          </div>

          <script>
            function closePopup() {
              document.getElementById("success-popup").style.display = "none";
              window.location.href = "index.php"; // redirect after closing
            }
          </script>
        </body>
        </html>
        <?php
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>