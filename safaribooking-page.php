<?php
// Example safari tours (slug => title)
$tours = [
  "mikumi-national-park" => "Mikumi National Park",
  "serengeti-safari" => "Serengeti Safari",
  "ngorongoro-crater" => "Ngorongoro Crater",
  "selous-game-reserve" => "Selous Game Reserve",
];

// Selected tour from query string
$selectedTour = $_GET['safari'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Safari Booking</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      margin: 0;
      padding: 20px;
    }
    .booking-container {
      max-width: 600px;
      margin: auto;
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      animation: fadeIn 0.6s ease;
    }
    @keyframes fadeIn { from {opacity:0; transform:translateY(10px);} to {opacity:1; transform:translateY(0);} }
    h2 { text-align: center; margin-bottom: 20px; }
    label { display: block; margin-top: 10px; font-weight: 600; }
    input, textarea, select {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }
    .tours-list { margin: 20px 0; }
    .tours-list label {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 8px;
      cursor: pointer;
      transition: 0.2s;
    }
    .tours-list label:hover { background: #f0f8ff; }
    .buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    .buttons button {
      padding: 10px 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }
    .proceed { background: #f0ad4e; color: #fff; }
    .proceed:hover { background: #ec971f; }
    .complete { background: #5cb85c; color: #fff; }
    .complete:hover { background: #449d44; }
  </style>
</head>
<body>
  <div class="booking-container">
    <h2>Safari Booking</h2>
    <form method="post" action="save_booking.php">
      <label>Name</label>
      <input type="text" name="name" required>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>WhatsApp Number</label>
      <input type="text" name="whatsapp" required>

      <label>Tour Date</label>
      <input type="date" name="date" required>

      <label>Number of People</label>
      <input type="number" name="people" min="1" required>

      <label>Special Requests</label>
      <textarea name="requests" rows="3"></textarea>

      <!-- Safari tours -->
      <div class="tours-list">
        <h3>Select Tours</h3>
        <?php foreach ($tours as $slug => $title): ?>
          <label>
            <input type="checkbox" name="safari[]" value="<?= htmlspecialchars($slug) ?>"
              <?= ($slug === $selectedTour) ? 'checked' : '' ?>>
            <?= htmlspecialchars($title) ?>
          </label>
        <?php endforeach; ?>
      </div>

      <!-- Buttons -->
      <div class="buttons">
        <button type="button" class="proceed" id="proceedBtn">Proceed with Choosing Tours</button>
        <button type="submit" class="complete">Complete Booking</button>
      </div>
    </form>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const form = document.querySelector("form");

      // Restore from localStorage
      ["name","email","whatsapp","date","people","requests"].forEach(field => {
        if (localStorage.getItem(field)) {
          form.elements[field].value = localStorage.getItem(field);
        }
      });
      if (localStorage.getItem("safari")) {
        let tours = JSON.parse(localStorage.getItem("safari"));
        document.querySelectorAll("input[name='safari[]']").forEach(c => {
          if (tours.includes(c.value)) c.checked = true;
        });
      }

      // Save to localStorage
      form.addEventListener("input", e => {
        if (e.target.name === "safari[]") {
          let selected = [];
          document.querySelectorAll("input[name='safari[]']:checked").forEach(c => selected.push(c.value));
          localStorage.setItem("safari", JSON.stringify(selected));
        } else {
          localStorage.setItem(e.target.name, e.target.value);
        }
      });

      // Proceed button → back to tours section
      document.getElementById("proceedBtn").addEventListener("click", () => {
        window.location.href = "index.php#tours";
      });
    });
  </script>
</body>
</html>