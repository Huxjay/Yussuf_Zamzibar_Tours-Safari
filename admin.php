<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard - Yussuf Zanzibar Tours</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/admin.css">

<style>
 
</style>
</head>
<body>

  <!-- Sidebar -->
  <div id="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="bookings.php" class="active">Bookings Management</a></li>
      <li><a href="customers.php">Customer Management</a></li>
      <li><a href="tours.php">Tours Management & Safari</a></li>
      <li><a href="reports.php">Reports</a></li>
      <li><a href="notifications.php">Notifications</a></li>
      <li><a href="settings.php">Settings</a></li>
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

    <div class="dashboard-section">
      <!-- Here you can later put tables for Bookings, Customers, etc. -->
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