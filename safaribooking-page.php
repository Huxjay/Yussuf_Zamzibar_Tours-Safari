<?php
// Safari tours - updated to match your index.php safari cards
$tours = [
  "mikumi-national-park" => "Mikumi National Park (Full-Day Safari with Direct Flight from Zanzibar)",
  "ngorongoro-tarangire-2days" => "Ngorongoro & Tarangire (2 Days / 1 Night - Safari)",
  "ngorongoro-tarangire-lake-manyara-3days" => "Ngorongoro, Tarangire & Lake Manyara (3 Days / 2 Nights – Safari)",
  "serengeti-ngorongoro-3days" => "Serengeti & Ngorongoro (3 Days / 2 Nights Safari)",
  "serengeti-tarangire-ngorongoro-4days" => "Serengeti, Tarangire & Ngorongoro (4 Days / 3 Nights Safari)",
];

// Selected tour from query string
$selectedTour = $_GET['safari'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Safari Booking</title>
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
<style>
    /* Global Styles */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4efe9 100%);
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    
    /* Make header and footer sticky */
    header {
        background: linear-gradient(to right, #2c7744, #5a3f37);
        color: white;
        padding: 0.8rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    
    header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }
    
    .menu-toggle {
        font-size: 1.3rem;
        cursor: pointer;
        padding: 0.4rem;
        border-radius: 4px;
        transition: background 0.3s;
    }
    
    .menu-toggle:hover {
        background: rgba(255,255,255,0.2);
    }
    
    .desktop-nav {
        display: flex;
        gap: 1rem;
    }
    
    .desktop-nav a {
        color: white;
        text-decoration: none;
        font-weight: 500;
        padding: 0.4rem 0.8rem;
        border-radius: 4px;
        transition: background 0.3s;
        font-size: 0.9rem;
    }
    
    .desktop-nav a:hover {
        background: rgba(255,255,255,0.2);
    }
    
    /* Sidebar Styles */
    #sidebar {
        position: fixed;
        top: 0;
        left: -300px;
        width: 300px;
        height: 100%;
        background: linear-gradient(to bottom, #2c7744, #5a3f37);
        color: white;
        transition: left 0.3s ease;
        z-index: 1000;
        box-shadow: 4px 0 15px rgba(0,0,0,0.2);
        padding: 2rem 0;
        overflow-y: auto;
    }
    
    #sidebar.active {
        left: 0;
    }
    
    .close-btn {
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 0.5rem;
        border-radius: 50%;
        background: rgba(0,0,0,0.2);
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    #sidebar ul {
        list-style: none;
        margin-top: 3rem;
    }
    
    #sidebar li {
        padding: 0;
        margin: 0;
    }
    
    #sidebar a {
        display: block;
        color: white;
        text-decoration: none;
        padding: 0.8rem 2rem;
        transition: background 0.3s;
        font-weight: 500;
        font-size: 0.95rem;
    }
    
    #sidebar a:hover {
        background: rgba(255,255,255,0.1);
    }
    
    /* Main Content - More Compact */
    .booking-container {
        max-width: 700px;
        margin: 1.5rem auto;
        background: #fff;
        border-radius: 12px;
        padding: 1.8rem;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        animation: fadeIn 0.6s ease;
        flex: 1;
    }
    
    @keyframes fadeIn { 
        from { opacity: 0; transform: translateY(15px); } 
        to { opacity: 1; transform: translateY(0); } 
    }
    
    h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #2c7744;
        font-size: 1.8rem;
        font-weight: 700;
        position: relative;
        padding-bottom: 0.5rem;
    }
    
    h2:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(to right, #f0ad4e, #5cb85c);
        border-radius: 2px;
    }
    
    /* Compact Form Styles */
    form {
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
    }
    
    label {
        display: block;
        margin-top: 0.8rem;
        font-weight: 600;
        color: #444;
        font-size: 0.95rem;
    }
    
    input, textarea, select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 8px;
        border: 1.5px solid #e1e8ed;
        font-size: 0.95rem;
        transition: all 0.3s;
        background: #f9f9f9;
    }
    
    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: #5cb85c;
        background: #fff;
        box-shadow: 0 0 0 2px rgba(92, 184, 92, 0.2);
    }
    
    /* Compact Tours List */
    .tours-list { 
        margin: 1.5rem 0; 
    }
    
    .tours-list h3 {
        font-size: 1.2rem;
        color: #2c7744;
        margin-bottom: 1rem;
        padding-bottom: 0.4rem;
        border-bottom: 1.5px solid #e1e8ed;
    }
    
    .tours-list label {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px;
        border: 1.5px solid #e1e8ed;
        border-radius: 8px;
        margin-bottom: 8px;
        cursor: pointer;
        transition: all 0.2s;
        background: #f9f9f9;
        margin-top: 0;
        font-size: 0.9rem;
    }
    
    .tours-list label:hover { 
        background: #f0f8ff; 
        border-color: #c4e0f9;
        transform: translateY(-1px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    
    .tour-highlight {
        background-color: #e8f5e9 !important;
        border-color: #4caf50 !important;
        box-shadow: 0 2px 8px rgba(76, 175, 80, 0.2) !important;
    }
    
    input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #5cb85c;
        flex-shrink: 0;
    }
    
    /* Compact Buttons */
    .buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 1.5rem;
        gap: 0.8rem;
    }
    
    .buttons button {
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
        font-size: 0.95rem;
        font-weight: 600;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }
    
    .proceed { 
        background: linear-gradient(to right, #f0ad4e, #ec971f);
        color: #fff; 
    }
    
    .proceed:hover { 
        background: linear-gradient(to right, #ec971f, #d58512);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(240, 173, 78, 0.3);
    }
    
    .complete { 
        background: linear-gradient(to right, #5cb85c, #449d44);
        color: #fff; 
    }
    
    .complete:hover { 
        background: linear-gradient(to right, #449d44, #3d8b3d);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(92, 184, 92, 0.3);
    }
    
    /* Compact Notification */
    .notification {
        padding: 1rem;
        background: linear-gradient(to right, #e8f5e9, #d8edd9);
        border-left: 4px solid #4caf50;
        margin-bottom: 1.5rem;
        border-radius: 6px;
        color: #2e7d32;
        font-weight: 500;
        box-shadow: 0 3px 8px rgba(76, 175, 80, 0.15);
        font-size: 0.95rem;
    }
    
    /* Sticky Footer */
    footer {
        background: linear-gradient(to right, #2c7744, #5a3f37);
        color: white;
        text-align: center;
        padding: 1rem;
        margin-top: auto;
        font-weight: 500;
        box-shadow: 0 -4px 12px rgba(0,0,0,0.1);
        position: sticky;
        bottom: 0;
        z-index: 1000;
        font-size: 0.9rem;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .booking-container {
            margin: 1rem;
            padding: 1.2rem;
            border-radius: 10px;
        }
        
        header {
            padding: 0.7rem 1rem;
            flex-wrap: wrap;
        }
        
        header h1 {
            font-size: 1.3rem;
        }
        
        .desktop-nav {
            display: none;
        }
        
        .buttons {
            flex-direction: column;
        }
        
        h2 {
            font-size: 1.5rem;
        }
        
        .tours-list label {
            font-size: 0.85rem;
            padding: 10px;
        }
        
        input, textarea, select {
            padding: 8px;
        }
    }
    
    @media (min-width: 769px) {
        .menu-toggle {
            display: none;
        }
    }
    
    /* Scrollable form container for very small screens */
    @media (max-height: 700px) {
        .booking-container {
            max-height: calc(100vh - 140px);
            overflow-y: auto;
        }
    }
</style>
</head>
<body>
  <div class="booking-container">
    <h2>Safari Booking</h2>
    
    <?php if ($selectedTour && array_key_exists($selectedTour, $tours)): ?>
    <div class="notification">
      <strong><?php echo htmlspecialchars($tours[$selectedTour]); ?></strong> has been added to your booking. 
      You can add more safaris below or complete your booking.
    </div>
    <?php endif; ?>
    
    <form method="post" action="save_booking.php" id="bookingForm">
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
            <input type="checkbox" name="safari[]" value="<?= htmlspecialchars($slug) ?>">
            <?= htmlspecialchars($title) ?>
          </label>
        <?php endforeach; ?>
      </div>

      <!-- Buttons -->
      <div class="buttons">
        <button type="button" class="proceed" id="proceedBtn">Add More Safaris</button>
        <button type="submit" class="complete">Complete Booking</button>
      </div>
    </form>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const form = document.getElementById("bookingForm");
      const proceedBtn = document.getElementById("proceedBtn");
      
      // Function to get URL parameters
      function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        const regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        const results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
      };

      // Restore from localStorage
      ["name","email","whatsapp","date","people","requests"].forEach(field => {
        if (localStorage.getItem(field)) {
          form.elements[field].value = localStorage.getItem(field);
        }
      });
      
      // Handle safari selection - both from URL and localStorage
      const urlTour = getUrlParameter('safari');
      let selectedTours = [];
      
      // Get existing selections from localStorage
      try {
        if (localStorage.getItem("safari")) {
          selectedTours = JSON.parse(localStorage.getItem("safari"));
        }
      } catch (e) {
        console.error("Error parsing saved safari data:", e);
      }
      
      // Add URL tour if provided and not already in the list
      if (urlTour && !selectedTours.includes(urlTour)) {
        selectedTours.push(urlTour);
        localStorage.setItem("safari", JSON.stringify(selectedTours));
      }
      
      // Update checkboxes based on the combined selection
      document.querySelectorAll("input[name='safari[]']").forEach(checkbox => {
        checkbox.checked = selectedTours.includes(checkbox.value);
        
        // Highlight selected tours
        if (checkbox.checked) {
          checkbox.parentElement.classList.add('tour-highlight');
        }
      });

      // Save to localStorage on input
      form.addEventListener("input", e => {
        if (e.target.name === "safari[]") {
          let selected = [];
          document.querySelectorAll("input[name='safari[]']:checked").forEach(c => {
            selected.push(c.value);
            c.parentElement.classList.add('tour-highlight');
          });
          
          // Remove highlight from unchecked
          document.querySelectorAll("input[name='safari[]']:not(:checked)").forEach(c => {
            c.parentElement.classList.remove('tour-highlight');
          });
          
          localStorage.setItem("safari", JSON.stringify(selected));
        } else {
          localStorage.setItem(e.target.name, e.target.value);
        }
      });

      // Proceed button - go back to index with current selections preserved
      proceedBtn.addEventListener("click", () => {
        // Save all current form data
        ["name","email","whatsapp","date","people","requests"].forEach(field => {
          localStorage.setItem(field, form.elements[field].value);
        });
        
        let selectedTours = [];
        document.querySelectorAll("input[name='safari[]']:checked").forEach(c => {
          selectedTours.push(c.value);
        });
        localStorage.setItem("safari", JSON.stringify(selectedTours));
        
        // Redirect to index page - make sure this matches your page structure
        window.location.href = "index.php#safari";
      });
      
      // Clear URL parameters to avoid re-adding the same tour on refresh
      if (window.history.replaceState && getUrlParameter('safari')) {
        const urlWithoutParams = window.location.pathname;
        window.history.replaceState({}, document.title, urlWithoutParams);
      }
    });
  </script>


 <footer>
    📞 WhatsApp: +255 XXX  | 🌐 Yussuf Zanzibar Tour & Safari
  </footer>

  <script src="./assets/js/index.js"></script>
</body>
</html>