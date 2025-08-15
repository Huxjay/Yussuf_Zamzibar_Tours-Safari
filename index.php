<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Yussuf Zanzibar Tour & Safari</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/index.css">

<style>
    /* Fade Animation */
    .fade {
      opacity: 0;
      transform: translateY(10px);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .fade.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>

</head>
<body><header>
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

<!-- Main Content Area -->
<main>
<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'transfer':
        include 'transfer.php';
        break;

         case 'login':
        include 'login.php';
        break;

    default:
        // Your homepage content
        ?>
<section class="intro">
    <h2>Welcome to Zanzibar — Where Paradise Meets Adventure 🌴</h2>
    <p>
      Escape to a breathtaking island where turquoise waters kiss sunlit shores. From dreamy beaches to thrilling safaris, <strong>Yussuf Zanzibar Tour & Safari</strong> invites you to experience magic.
    </p>

    <div class="carousel-container">
      <div class="slider">
        <div class="slide"><img src="./assets/images/1716972340113.jpg" alt="Zanzibar 1"></div>
        <div class="slide"><img src="./assets/images/IMG_20230120_215855_247.jpg" alt="Safari 1"></div>
        <div class="slide"><img src="./assets/images/1699389072930.jpg" alt="Zanzibar 2"></div>
        <div class="slide"><img src="./assets/images/IMG_20231026_181133_720.jpg" alt="Safari 2"></div>
        <div class="slide"><img src="./assets/images/1716972340113.jpg" alt="Zanzibar 3"></div>
        <div class="slide"><img src="./assets/images/IMG_20230120_215855_247.jpg" alt="Safari 3"></div>
        <div class="slide"><img src="./assets/images/1699389072930.jpg" alt="Zanzibar 4"></div>
        <div class="slide"><img src="./assets/images/IMG_20231026_181133_720.jpg" alt="Safari 4"></div>
      </div>
    </div>

    <div class="button-container">
      <button class="explore-btn">Explore Now</button>
    </div>
  </section>



  <section class="difference">
    <h2 class="section-title">Why Travel with Yussuf Zanzibar?</h2>
    <div class="features">
      <div class="feature-box">
        <img src="https://cdn-icons-png.flaticon.com/512/2920/2920087.png" alt="Luxury icon" class="feature-icon">
        <h3>Tailored Luxury</h3>
        <p>From romantic escapes to private island adventures, every journey is designed with elegance and personal flair.</p>
      </div>
      <div class="feature-box">
        <img src="https://cdn-icons-png.flaticon.com/512/3022/3022344.png" alt="Authentic icon" class="feature-icon">
        <h3>True Zanzibar Vibes</h3>
        <p>Immerse yourself in local culture, vibrant nature, and timeless charm — all wrapped in authentic experiences.</p>
      </div>
      <div class="feature-box">
        <img src="https://cdn-icons-png.flaticon.com/512/235/235861.png" alt="Hidden gems icon" class="feature-icon">
        <h3>Hidden Gems Access</h3>
        <p>Discover secret beaches, private corners, and cultural treasures few ever see.</p>
      </div>
    </div>
  </section>


       
<section id="tours" class="tours-section">



<div class="tours-intro">
  <h2>Embrace the Spirit of Zanzibar with Yussuf Tours</h2>
  <p>Step into a world where every breeze carries a story, every path whispers ancient secrets, and your heart finds its rhythm among the waves. Let us guide you through Zanzibar’s timeless beauty, with adventures that stir your soul and memories that dance forever in your dreams.</p>
  <svg class="flourish" viewBox="0 0 100 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img">
    <path d="M10 10 Q 30 0 50 10 T 90 10" />
  </svg>
</div>
  <div class="tour-grid">
<!-- 
<div class="tour-card">
  <img src="./assets/images/tours/Safari-Blue-Adventure-08 (2).jpg" alt="Zanzibar Safari Blue Tour">
  <h3>Zanzibar Safari Blue Tour</h3>
  <a href="tour-details.php?tour=zanzibar-safari-blue-tour" class="view-tour-btn">View Tour</a>
</div> -->


<!-- Card -->
<div class="tour-card" data-tour="safari-blue">
  <img src="./assets/images/tours/Safari-Blue-Adventure-08 (2).jpg" alt="Zanzibar Safari Blue Tour">
  <h3>Zanzibar Safari Blue Tour</h3>
  <a href="#" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="sunset-dhow-cruise">
  <img src="./assets/images/tours/Sunset-Dhow-Cruise-04.jpg" alt="Sunset Dhow Cruise Zanzibar">
  <h3>Sunset Dhow Cruise Zanzibar</h3>
  <a href="#" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="swimming-with-dolphins-in-zanzibar">
  <img src="./assets/images/tours/dolphin-tour-with-snorkeling-at-mnemba-island-zanzibar_M4kn3.jpeg" 
       alt="Swimming With Dolphins in Zanzibar">
  <h3>Swimming With Dolphins in Zanzibar</h3>
  <a href="#" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="jozani-forest-cave-swimming-tour-combination">
  <img src="./assets/images/tours/Jozani-Forest-Tour-01-1 (1).jpg" 
       alt="Jozani Forest & Cave Swimming Tour Combination">
  <h3>Jozani Forest & Cave Swimming Tour Combination</h3>
  <a href="#" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="stone-town-prison-island-nakupenda-sandbank-tour-combination">
  <img src="./assets/images/tours/Stone-Town-Walking-Tour-02-768x512.jpg" 
       alt="Stone Town, Prison Island & Nakupenda Sandbank Tour Combination">
  <h3>Stone Town, Prison Island & Nakupenda Sandbank Tour Combination</h3>
  <a href="tour-details.php?tour=stone-town-prison-island-nakupenda-sandbank-tour-combination" 
     class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="spice-farm-jozani-forest-paje-beach-tour-combination">
  <img src="./assets/images/tours/Spice-Tour-05-768x512.jpg" alt="Zanzibar Spice Farm Tour">
  <h3>Spice farm, Jozani forest & Paje beach Tour Combination</h3>
  <a href="tour-details.php?tour=spice-farm-jozani-forest-paje-beach-tour-combination" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="zanzibar-spice-farm-tour">
  <img src="./assets/images/tours/spice tour.jpg" alt="Zanzibar Spice Farm Tour">
  <h3>Zanzibar Spice Farm Tour</h3>
  <a href="tour-details.php?tour=zanzibar-spice-farm-tour" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card" data-tour="jozan-forest-tour-zanzibar">
  <img src="./assets/images/tours/Jozani-Forest-Tour-01-1.jpg" alt="Jozan Forest Tour Zanzibar">
  <h3>Jozan Forest Tour Zanzibar</h3>
  <a href="tour-details.php?tour=jozan-forest-tour-zanzibar" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="nakupenda-sandbank-tour-zanzibar">
  <img src="./assets/images/tours/Nakupenda-Sandbank-Picnic-08-768x512.jpg" alt="Nakupenda Sandbank Tour Zanzibar">
  <h3>Nakupenda Sandbank Tour Zanzibar</h3>
  <a href="tour-details.php?tour=nakupenda-sandbank-tour-zanzibar" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card" data-tour="prison-island-tour-zanzibar">
  <img src="./assets/images/tours/Prison-Island-Tour-09-1-768x512.jpg" alt="Prison Island Tour Zanzibar">
  <h3>Prison Island Tour Zanzibar</h3>
  <a href="tour-details.php?tour=prison-island-tour-zanzibar" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="village-tour-zanzibar">
  <img src="./assets/images/tours/nungwi.jpg" alt="Village Tour Zanzibar: Experience the Real Island Life">
  <h3>Village Tour Zanzibar: Experience the Real Island Life</h3>
  <a href="tour-details.php?tour=village-tour-zanzibar" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card" data-tour="mnemba-atoll-snorkeling-trip-zanzibar">
  <img src="./assets/images/tours/atoll.jpg" alt="Mnemba Atoll Snorkeling Trip Zanzibar">
  <h3>Mnemba Atoll Snorkeling Trip Zanzibar</h3>
  <a href="tour-details.php?tour=mnemba-atoll-snorkeling-trip-zanzibar" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card" data-tour="cave-swimming-in-zanzibar">
  <img src="./assets/images/tours/Cultural-Experience-at-Kuza-Cave-with-Dining-at-The-Rock-Restaurant-01-768x512.jpg" alt="Cave swimming in Zanzibar: Maalum Cave, Kuza Cave or Swahili Cave">
  <h3>Cave swimming in Zanzibar: Maalum Cave, Kuza Cave or Swahili Cave</h3>
  <a href="tour-details.php?tour=cave-swimming-in-zanzibar" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card"  data-tour= "swimming-with-turtles-in-zanzibar">
  <img src="./assets/images/tours/swim-with-turtles-2.jpg" alt="Swimming with Turtles in Zanzibar">
  <h3>Swimming with Turtles in Zanzibar</h3>
  <a href="tour-details.php?tour=swimming-with-turtles-in-zanzibar" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card" data-tour="horse-riding-in-zanzibar">
  <img src="./assets/images/tours/horse-riding-9-768x536.jpg" alt="Horse Riding in Zanzibar">
  <h3>Horse Riding in Zanzibar</h3>
  <a href="tour-details.php?tour=horse-riding-in-zanzibar" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="quad-biking-in-zanzibar">
  <img src="./assets/images/tours/quad-biking-10-768x512.jpg" alt="Quad Biking in Zanzibar">
  <h3>Quad Biking in Zanzibar</h3>
  <a href="tour-details.php?tour=quad-biking-in-zanzibar" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card" data-tour="kite-surfing-zanzibar">
  <img src="./assets/images/tours/kite-surfing-4.webp" alt="Kite Surfing Zanzibar">
  <h3>Kite Surfing Zanzibar</h3>
  <a href="tour-details.php?tour=kite-surfing-zanzibar" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card" data-tour="scuba-diving-in-zanzibar">
  <img src="./assets/images/tours/scuba-diving-768x512.jpg" alt="Scuba Diving in Zanzibar">
  <h3>Scuba Diving in Zanzibar</h3>
  <a href="tour-details.php?tour=scuba-diving-in-zanzibar" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card" data-tour="game-fishing-zanzibar">
  <img src="./assets/images/tours/game-fishing-3-768x576.jpg" alt="Game Fishing Zanzibar">
  <h3>Game Fishing Zanzibar</h3>
  <a href="tour-details.php?tour=game-fishing-zanzibar" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card" data-tour="spice-farm-stone-town-tour-combination">
  <img src="./assets/images/tours/stone walking.jpg" alt="Spice Farm & Stone Town Tour Combination">
  <h3>Spice Farm & Stone Town Tour Combination</h3>
  <a href="tour-details.php?tour=spice-farm-stone-town-tour-combination" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="spice-farm-stone-town-tour-combination">
  <img src="./assets/images/tours/Stone-Town-Walking-Tour-05-768x512.jpg" alt="Stone Town & Prison Island Tour Combination">
  <h3>Stone Town & Prison Island Tour Combination</h3>
  <a href="tour-details.php?tour=stone-town-prison-island-tour-combination" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card" data-tour="spice-farm-jozani-forest-tour-combination">
  <img src="./assets/images/tours/Jozani-Forest-Tour-01-1-768x512.jpg" alt="Spice Farm & Jozani Forest Tour Combination">
  <h3>Spice Farm & Jozani Forest Tour Combination</h3>
  <a href="tour-details.php?tour=spice-farm-jozani-forest-tour-combination" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="village-tour-stone-town-tour-combination">
  <img src="./assets/images/tours/village-tour-768x489.webp" alt="Village Tour & Stone Town Tour Combination">
  <h3>Village Tour & Stone Town Tour Combination</h3>
  <a href="tour-details.php?tour=village-tour-stone-town-tour-combination" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="spice-farm-prison-island-stone-town-tour-combination">
  <img src="./assets/images/tours/Spice-Tour-07-768x512.jpg" alt="Spice Farm, Prison Island & Stone Town Tour Combination">
  <h3>Spice Farm, Prison Island & Stone Town Tour Combination</h3>
  <a href="tour-details.php?tour=spice-farm-prison-island-stone-town-tour-combination" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="spice-farm-jozani-forest-rock-restaurant-tour-combination">
  <img src="./assets/images/tours/Dining-at-The-Rock-Zanzibar-01-768x512.jpg" alt="Spice farm, Jozani forest & The Rock Restaurant Tour Combination">
  <h3>Spice farm, Jozani forest & The Rock Restaurant Tour Combination</h3>
  <a href="tour-details.php?tour=spice-farm-jozani-forest-rock-restaurant-tour-combination" class="view-tour-btn">View Tour</a>
</div>

<div class="tour-card" data-tour="mnemba-island-swimming-with-turtles-nungwi-kendwa-tour-combination">
  <img src="./assets/images/tours/Zanzibar-Nungwi-beach-768x575.webp" alt="Mnemba Island, Swimming with Turtles & Nungwi/Kendwa Beach Tour Combination">
  <h3>Mnemba Island, Swimming with Turtles & Nungwi/Kendwa Beach Tour Combination</h3>
  <a href="tour-details.php?tour=mnemba-island-swimming-with-turtles-nungwi-kendwa-tour-combination" class="view-tour-btn">View Tour</a>
</div>


<div class="tour-card" data-tour="horse-riding-swimming-with-turtles-nungwi-kendwa-tour-combination">
  <img src="./assets/images/tours/nungwi-bwach-3-768x453.jpg" alt="Horse Riding, Swimming with Turtles & Nungwi/Kendwa beach Tour Combination">
  <h3>Horse Riding, Swimming with Turtles & Nungwi/Kendwa beach Tour Combination</h3>
  <a href="tour-details.php?tour=horse-riding-swimming-with-turtles-nungwi-kendwa-tour-combination" class="view-tour-btn">View Tour</a>
</div>

<!-- Tour Popup -->
<div id="tour-popup" class="popup">
  <div class="popup-content">
    <span class="close-btn">&times;</span>
    <div id="tour-popup-tabs"></div>      <!-- unique ID -->
    <div id="tour-popup-body"></div>      <!-- unique ID -->
    <div class="popup-footer">
      <a href="booking-page.php" class="book-btn">BOOK THIS TOUR</a>
    </div>
  </div>
</div>

</section>







        <section id = "safari" class="safaris-section">

  <div class="safaris-intro">
    <h2>Journey Into the Heart of Wild Tanzania with Yussuf Safaris</h2>
    <p>Venture beyond the shores of Zanzibar, where endless plains stretch beneath golden skies and the call of the wild stirs your soul. Whether a fleeting day of awe or an immersive four-day odyssey, our safaris unlock the secrets of Tanzania’s majestic wildlife and timeless landscapes — all guided by passion, expertise, and the promise of unforgettable memories.</p>
    <svg class="flourish" viewBox="0 0 100 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img">
      <path d="M10 10 Q 30 0 50 10 T 90 10" />
    </svg>
  </div>

  <div class="safari-grid">

    <div class="safari-card" data-safari="mikumi-national-park">
      <img src="./assets/images/safari/mikumi national park.webp" alt="Mikumi National Park Safari">
      <h3>Mikumi National Park</h3>
      <p class="safari-subtitle">(Full-Day Safari with Direct Flight from Zanzibar)</p>
      <a href="#" class="view-safari-btn">View Safari</a>
    </div>

    <div class="safari-card" data-safari="ngorongoro-tarangire-2days">
      <img src="./assets/images/safari/ngorongoro and tarangire.webp" alt="Ngorongoro & Tarangire - 2 Days / 1 Night Safari">
      <h3>Ngorongoro & Tarangire</h3>
      <p class="safari-subtitle">(2 Days / 1 Night - Safari)</p>
      <a href="#" class="view-safari-btn">View Safari</a>
    </div>

    <div class="safari-card" data-safari="ngorongoro-tarangire-lake-manyara-3days">
      <img src="./assets/images/safari/ngorongoro tarangire and lago manyara.jpg" alt="Ngorongoro, Tarangire & Lake Manyara - 3 Days / 2 Nights Safari">
      <h3>Ngorongoro, Tarangire & Lake Manyara</h3>
      <p class="safari-subtitle">(3 Days / 2 Nights – Safari)</p>
      <a href="#" class="view-safari-btn">View Safari</a>
    </div>

    <div class="safari-card" data-safari="serengeti-ngorongoro-3days">
      <img src="./assets/images/safari/serenget and ngorongoro.jpg" alt="Serengeti & Ngorongoro - 3 Days / 2 Nights Safari">
      <h3>Serengeti & Ngorongoro</h3>
      <p class="safari-subtitle">(3 Days / 2 Nights Safari)</p>
      <a href="#" class="view-safari-btn">View Safari</a>
    </div>

    <div class="safari-card" data-safari="serengeti-tarangire-ngorongoro-4days">
      <img src="./assets/images/safari/serengeti tarangire and ngorongoro.jpg" alt="Serengeti, Tarangire & Ngorongoro - 4 Days / 3 Nights Safari">
      <h3>Serengeti, Tarangire & Ngorongoro</h3>
      <p class="safari-subtitle">(4 Days / 3 Nights Safari)</p>
      <a href="#" class="view-safari-btn">View Safari</a>
    </div>

  </div>


<!-- Safari Popup -->
<div id="safari-popup" class="popup">
  <div class="popup-content">
    <span class="close-btn">&times;</span>
    <div id="safari-popup-tabs"></div>    <!-- unique ID -->
    <div id="safari-popup-body"></div>    <!-- unique ID -->
    <div class="popup-footer">
      <a href="booking-page.php" class="book-btn">BOOK THIS SAFARI</a>
    </div>
  </div>
</div>

</section>







        <?php
}
?>
</main>

  

  






<!-- Floating Social Media Widget -->
<div class="social-media-widget">
  <div class="toggle-btn" id="toggleSocials">+</div>
  <div class="social-icons">
    <a href="https://wa.me/255714610794" target="_blank" title="WhatsApp">
      <img src="https://img.icons8.com/color/48/whatsapp--v1.png" alt="WhatsApp"/>
    </a>
    <a href="https://www.instagram.com/yourpage" target="_blank" title="Instagram">
      <img src="https://img.icons8.com/color/48/instagram-new--v1.png" alt="Instagram"/>
    </a>
    <a href="https://www.facebook.com/yourpage" target="_blank" title="Facebook">
      <img src="https://img.icons8.com/color/48/facebook-new.png" alt="Facebook"/>
    </a>
    <a href="https://www.tiktok.com/@yourpage" target="_blank" title="TikTok">
      <img src="https://img.icons8.com/color/48/tiktok--v1.png" alt="TikTok"/>
    </a>
   <a href="https://mail.google.com/mail/?view=cm&fs=1&to=yussufzanzibar611@gmail.com" target="_blank" title="Email">
  <img src="https://img.icons8.com/color/48/new-post.png" alt="Email"/>
</a>
    <a href="https://www.snapchat.com/add/yussufzanzibar?share_id=5SFLXv7dZfE&locale=en-GB " target="_blank" title="Snapchat">
      <img src="https://img.icons8.com/color/48/snapchat-circled-logo--v1.png" alt="Snapchat"/>
    </a>
  </div>
</div>

<footer>
    📞 WhatsApp: +255 XXX  | 🌐 Yussuf Zanzibar Tour & Safari
  </footer>














  
  <script src="./assets/js/index.js"></script>
</body>
</html>