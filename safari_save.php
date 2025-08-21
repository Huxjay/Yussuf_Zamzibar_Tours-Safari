<?php
// safari_save.php
include 'includes/db.php'; // database connection
require 'send_email.php';  // include email functions

// Safari list (same as in your booking form)
$tours = [
  "mikumi-national-park" => "Mikumi National Park (Full-Day Safari with Direct Flight from Zanzibar)",
  "ngorongoro-tarangire-2days" => "Ngorongoro & Tarangire (2 Days / 1 Night - Safari)",
  "ngorongoro-tarangire-lake-manyara-3days" => "Ngorongoro, Tarangire & Lake Manyara (3 Days / 2 Nights – Safari)",
  "serengeti-ngorongoro-3days" => "Serengeti & Ngorongoro (3 Days / 2 Nights Safari)",
  "serengeti-tarangire-ngorongoro-4days" => "Serengeti, Tarangire & Ngorongoro (4 Days / 3 Nights Safari)",
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $whatsapp   = $_POST['whatsapp'];
    $safariDate = $_POST['date'];
    $people     = $_POST['people'];
    $requests   = $_POST['requests'] ?? '';
    $safari     = isset($_POST['safari']) ? $_POST['safari'] : [];

    // Convert selected safari tours into JSON (so multiple choices can be stored)
    $selectedSafari = json_encode($safari);

    // Insert into SafariBookings table
    $sql = "INSERT INTO SafariBookings (name, email, whatsapp, safari_date, people, requests, selected_safari)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssiss", $name, $email, $whatsapp, $safariDate, $people, $requests, $selectedSafari);

    if ($stmt->execute()) {
        // ✅ Send admin notification email
        $bookingData = [
            'name'     => $name,
            'email'    => $email,
            'whatsapp' => $whatsapp,
            'date'     => $safariDate,
            'people'   => $people,
            'requests' => $requests,
            'safari'   => $safari
        ];

        $adminEmail = "husseinjuma0097@gmail.com"; // change to your real admin email
        sendSafariBookingEmail($adminEmail, $bookingData, $tours);

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <title>Booking Success</title>
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
              <h2>✅ Safari Booking Submitted</h2>
              <p>Your safari booking was submitted successfully!<br>
                 Our admin has been notified via email.</p>
              <button onclick="closePopup()">OK</button>
            </div>
          </div>

          <script>
            function closePopup() {
              document.getElementById("success-popup").style.display = "none";
              // clear form data from localStorage so user doesn't see old values
              localStorage.clear();
              // redirect back to safari section
              window.location.href = "index.php#safari";
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