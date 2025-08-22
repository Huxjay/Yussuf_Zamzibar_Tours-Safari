<?php
// tours list (normally it would fetch from DB)
$tours = [
    "safari-blue" => "Zanzibar Safari Blue Tour",
    "sunset-dhow-cruise" => "Sunset Dhow Cruise Zanzibar",
    "swimming-with-dolphins-in-zanzibar" => "Swimming With Dolphins in Zanzibar",
    "jozani-forest-cave-swimming-tour-combination" => "Jozani Forest & Cave Swimming Tour Combination",
    "stone-town-prison-island-nakupenda-sandbank-tour-combination" => "Stone Town, Prison Island & Nakupenda Sandbank Tour Combination",
    "zanzibar-spice-farm-tour" => "Zanzibar Spice Farm Tour",
    "jozan-forest-tour-zanzibar" => "Jozan Forest Tour Zanzibar",
    "nakupenda-sandbank-tour-zanzibar" => "Nakupenda Sandbank Tour Zanzibar",
    "prison-island-tour-zanzibar" => "Prison Island Tour Zanzibar",
    "village-tour-zanzibar" => "Village Tour Zanzibar: Experience the Real Island Life",
    "mnemba-atoll-snorkeling-trip-zanzibar" => "Mnemba Atoll Snorkeling Trip Zanzibar",
    "cave-swimming-in-zanzibar" => "Cave swimming in Zanzibar: Maalum Cave, Kuza Cave or Swahili Cave",
    "swimming-with-turtles-in-zanzibar" => "Swimming with Turtles in Zanzibar",
    "horse-riding-in-zanzibar" => "Horse Riding in Zanzibar",
    "quad-biking-in-zanzibar" => "Quad Biking in Zanzibar",
    "kite-surfing-zanzibar" => "Kite Surfing Zanzibar",
    "scuba-diving-in-zanzibar" => "Scuba Diving in Zanzibar",
    "game-fishing-zanzibar" => "Game Fishing Zanzibar",
    "spice-farm-stone-town-tour-combination" => "Spice Farm & Stone Town Tour Combination",
    "stone-town-prison-island-tour-combination" => "Stone Town & Prison Island Tour Combination",
    "spice-farm-jozani-forest-tour-combination" => "Spice Farm & Jozani Forest Tour Combination",
    "village-tour-stone-town-tour-combination" => "Village Tour & Stone Town Tour Combination",
    "spice-farm-prison-island-stone-town-tour-combination" => "Spice Farm, Prison Island & Stone Town Tour Combination",
    "spice-farm-jozani-forest-rock-restaurant-tour-combination" => "Spice farm, Jozani forest & The Rock Restaurant Tour Combination",
    "mnemba-island-swimming-with-turtles-nungwi-kendwa-tour-combination" => "Mnemba Island, Swimming with Turtles & Nungwi/Kendwa Beach Tour Combination",
    "horse-riding-swimming-with-turtles-nungwi-kendwa-tour-combination" => "Horse Riding, Swimming with Turtles & Nungwi/Kendwa beach Tour Combination",
];

// Get pre-selected tour from URL
$selectedTour = $_GET['tour'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Tour</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/index.css">
 
</head>
<header>
    <div class="menu-toggle" onclick="toggleSidebar()">☰</div>
    <h1>Yussuf Zanzibar Tour & Safari</h1>
    <nav class="desktop-nav">
      <a href="index.php">Home</a>
      <a href="index.php#tours">Tours</a>
      <a href="index.php#safari">Safari</a>
      <a href="index.php?page=transfer">Transfer</a>
      <a href="index.php?page=login">Adimin Login</a>
      <a href="#">Contact</a>
    </nav>
</header>


<div id="sidebar">
    <div class="close-btn" onclick="toggleSidebar()">✖</div>
    <ul>
      <li><a href="index.php#tours">Tours</a></li>
      <li><a href="index.php#safari">Safari</a></li>
      <li><a href="index.php?page=transfer">transfer</a></li>
      <li><a href="index.php?page=login">Adimin Login</a></li>

       </ul>
</div>


<style></style>
  <div class="booking-container">
    <h1>Tour Booking</h1>
    <form action="tour_save.php" method="POST" id="bookingForm">
      
      <!-- Personal Info -->
      <label>Full Name</label>
      <input type="text" name="name" required>
      
      <label>Email</label>
      <input type="email" name="email" required>
      
      <label>WhatsApp Number</label>
      <input type="text" name="whatsapp" required>
      
      <label>Tour Date</label>
      <input type="date" name="date" required>
      
      <label>Number of People</label>
      <input type="number" name="people" min="1" required>
      
      <!-- Tours -->
<div class="tours-list">
  <h3>Select Tours</h3>
  <div class="tours-grid1">
    <?php foreach ($tours as $slug => $title): ?>
      <label>
        <?= htmlspecialchars($title) ?>
        <input type="checkbox" name="tours[]" value="<?= htmlspecialchars($slug) ?>"
          <?= ($slug === $selectedTour) ? 'checked' : '' ?>>
      </label>
    <?php endforeach; ?>
  </div>
</div>
      <!-- Approval Preference -->
      <label>Preferences About Tour Approval</label>
      <textarea name="preferences" rows="3" placeholder="Write your special requests or preferences..."></textarea>
      
      <!-- Buttons -->
      <!-- Buttons -->
<div class="buttons">
  <!-- Back link (just navigation, not DB) -->
  <a href="index.php#tours" class="proceed">← Back to Tours</a>
  
  <!-- This one saves data to DB via process-booking.php -->
  <button type="submit" class="complete">✅ Complete Booking</button>
</div>
    </form>
  </div>

  <script>
  // Save form data to localStorage on input
  document.querySelectorAll("#bookingForm input, #bookingForm textarea").forEach(el => {
    el.addEventListener("input", () => {
      if (el.type === "checkbox") {
        let selectedTours = [];
        document.querySelectorAll("input[name='tours[]']:checked").forEach(c => {
          selectedTours.push(c.value);
        });
        localStorage.setItem("tours", JSON.stringify(selectedTours));
      } else {
        localStorage.setItem(el.name, el.value);
      }
    });
  });
// Load form data when page loads
window.addEventListener("DOMContentLoaded", () => {
  // Restore saved text/number/email/date/textarea
  document.querySelectorAll("#bookingForm input, #bookingForm textarea").forEach(el => {
    if (el.type !== "checkbox" && localStorage.getItem(el.name)) {
      el.value = localStorage.getItem(el.name);
    }
  });

  // ✅ Restore tours from localStorage
  let savedTours = [];
  if (localStorage.getItem("tours")) {
    savedTours = JSON.parse(localStorage.getItem("tours"));
    document.querySelectorAll("input[name='tours[]']").forEach(c => {
      if (savedTours.includes(c.value)) c.checked = true;
    });
  }

  // ✅ Force check the currently selected tour from URL (PHP echo)
  const preselected = "<?= htmlspecialchars($tours[$selectedTour] ?? '') ?>";
  if (preselected) {
    document.querySelectorAll("input[name='tours[]']").forEach(c => {
      if (c.value === preselected && !savedTours.includes(preselected)) {
        c.checked = true;
        savedTours.push(preselected);
      }
    });
    localStorage.setItem("tours", JSON.stringify(savedTours));
  }
});

  </script>

  <footer>
    📞 WhatsApp: +255 XXX  | 🌐 Yussuf Zanzibar Tour & Safari
  </footer>

  <script src="./assets/js/index.js"></script>
</body>
</html>