<?php
// tour_save.php
include 'includes/db.php';      // Database connection
include 'send_email.php';       // Include email functions

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name        = $_POST['name'];
    $email       = $_POST['email'];
    $whatsapp    = $_POST['whatsapp'];
    $tour_date   = $_POST['date'];
    $people      = $_POST['people'];
    $preferences = $_POST['preferences'] ?? '';
    $tours       = isset($_POST['tours']) ? (array) $_POST['tours'] : []; // Ensure array

    // Convert tours array to JSON for DB
    $selectedTours = json_encode($tours);

    $sql = "INSERT INTO TourBookings (name, email, whatsapp, tour_date, people, preferences, selected_tours) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssiss", $name, $email, $whatsapp, $tour_date, $people, $preferences, $selectedTours);

    if ($stmt->execute()) {
        // ✅ Send Email Notification to Admin
        $adminEmail = "yussufzanzibar611@gmail.com"; // Change if needed

        // Example tours list (slug => full name) - adjust as per DB
        $toursList = [
            "stone-town"    => "Stone Town Tour",
            "prison-island" => "Prison Island Tour",
            "spice-tour"    => "Spice Farm Tour",
            "safari-blue"   => "Safari Blue Experience",
            "jozani"        => "Jozani Forest Tour"
        ];

        // Prepare bookingData for email
        $bookingData = [
            'name'        => $name,
            'email'       => $email,
            'whatsapp'    => $whatsapp,
            'date'        => $tour_date,
            'people'      => $people,
            'preferences' => $preferences,
            'tours'       => $tours // Already ensured array
        ];

        // Send the email using updated send_email.php
        sendTourBookingEmail($adminEmail, $bookingData, $toursList);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <title>Booking Success</title>
          <style>
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
            .popup-content h2 { margin-bottom: 10px; color: #2ecc71; }
            .popup-content p { margin-bottom: 20px; font-size: 16px; color: #555; }
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
            .popup-content button:hover { background: #111111ff; }
          </style>
        </head>
        <body>
          <div id="success-popup" class="popup">
            <div class="popup-content">
              <h2>✅ Booking Submitted</h2>
              <p>Your booking was submitted successfully!</p>
              <button onclick="closePopup()">OK</button>
            </div>
          </div>

          <script>
            function closePopup() {
              document.getElementById("success-popup").style.display = "none";
              window.location.href = "index.php";
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