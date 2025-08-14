<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Yussuf Zanzibar Tour & Safari</title>
  <link rel="stylesheet" href="style.css">
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
<body>

<header>
    <div class="menu-toggle" onclick="toggleSidebar()">☰</div>
    <h1>Yussuf Zanzibar Tour & Safari</h1>
    <nav class="desktop-nav">
      <a href="index.php">Home</a>
      <a href="index.php#tours">Tours</a>
      <a href="index.php#safari">Safari</a>
      <a href="index.php?page=transfer">Transfer</a>
      <a href="#">Admin Login</a>
      <a href="#">Contact</a>
    </nav>
</header>

<div id="sidebar">
    <div class="close-btn" onclick="toggleSidebar()">✖</div>
    <ul>
      <li><a href="index.php#tours">Tours</a></li>
      <li><a href="index.php#safari">Safari</a></li>
      <li><a href="index.php?page=transfer">Transfer</a></li>
      <li><a href="#">Admin Login</a></li>
    </ul>
</div>

<!-- Main Content Area -->
<main id="mainContent" class="fade">
<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'transfer':
        include 'transfer.php';
        break;

    default:
        ?>
        <section id="tours" class="tours-section">
            <h2>Tours</h2>
            <p>All tours info here...</p>
        </section>

        <section id="safari" class="safari-section">
            <h2>Safari</h2>
            <p>All safari info here...</p>
        </section>
        <?php
}
?>
</main>

<script>
function toggleSidebar() {
  document.getElementById('sidebar').classList.toggle('open');
}

// Fade-in effect after load
window.addEventListener('DOMContentLoaded', () => {
  const mainContent = document.getElementById('mainContent');
  setTimeout(() => {
    mainContent.classList.add('show');
  }, 50);
});
</script>

</body>
</html>



