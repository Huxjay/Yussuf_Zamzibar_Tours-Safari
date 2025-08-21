<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard - Yussuf Zanzibar Tours</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./assets/css/admin.css">
<style>
/* Fade Animation for dynamic content */
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

  <!-- Sidebar -->
  <div id="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="admin.php?page=bookings" class="active">Bookings Management</a></li>
      <li><a href="admin.php?page=toursafari">Tours & Safari Management</a></li>
      <li><a href="admin.php?page=transfer_admin_side">Transport</a></li>
      <li><a href="admin.php?page=reports">Reports</a></li>
      <li><a href="admin.php?page=notifications">Notifications</a></li>
      <li><a href="admin.php?page=settings">Settings</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>

  <!-- Top Navbar -->
  <div id="top-nav">
    <div class="menu-toggle" onclick="toggleSidebar()">☰</div>
    <div class="profile">
      <span>Admin Name</span>
      <img src="https://via.placeholder.com/38" alt="Profile">
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="fade show">
      <?php
      $page = $_GET['page'] ?? 'dashboard';

      switch ($page) {
        case 'bookings':
          include 'bookings.php';
          break;

        case 'toursafari':
          include 'toursafari.php';
          break;

        case 'transfer_admin_side':
          include 'transfer_admin_side.php';
          break;

        case 'reports':
          include 'reports.php';
          break;

        case 'notifications':
          include 'notifications.php';
          break;

        case 'settings':
          include 'settings.php';
          break;

        default:
          // Default dashboard overview
          ?>
          <h1>Welcome, Admin!</h1>
          <p>Overview of the system and quick statistics:</p>

          <div class="cards">
            <div class="card">
              <h3>Total Bookings</h3>
              <p>125</p>
            </div>
            <div class="card">
              <h3>Total Customers</h3>
              <p>78</p>
            </div>
            <div class="card">
              <h3>Active Tours</h3>
              <p>15</p>
            </div>
            <div class="card">
              <h3>Pending Approvals</h3>
              <p>5</p>
            </div>
          </div>
          <?php
          break;
      }
      ?>
    </div>
  </div>

<script>
const sidebar = document.getElementById("sidebar");
function toggleSidebar() {
  sidebar.classList.toggle("collapsed");
  if(window.innerWidth <= 768) {
    sidebar.classList.toggle("show");
  }
}
</script>
</body>
</html>