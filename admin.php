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

/* Dashboard Cards */
.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  margin: 30px 0;
}

.card {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: #fff;
  padding: 25px;
  border-radius: 18px;
  text-align: center;
  box-shadow: 0 10px 30px rgba(0,0,0,0.25);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
  overflow: hidden;
}

/* Overlay for better readability */
.card::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.25);
  border-radius: inherit;
  z-index: 0;
}

.card * {
  position: relative;
  z-index: 1;
}

.card:hover {
  transform: translateY(-6px) scale(1.02);
  box-shadow: 0 15px 40px rgba(0,0,0,0.35);
}

.card h3 {
  margin: 0 0 12px 0;
  font-size: 15px;
  font-weight: 600;
  color: #f1f1f1;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.card p {
  margin: 0;
  font-size: 34px;
  font-weight: bold;
  color: #fff;
  text-shadow: 0 2px 8px rgba(0,0,0,0.4);
}

/* Different Variants */
.card-small {
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}
.card-warning {
  background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
  color: #2c3e50;
}
.card-success {
  background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}

/* Mini charts */
.mini-chart {
  display: flex;
  justify-content: space-between;
  margin-top: 30px;
  gap: 15px;
}

.chart-item {
  flex: 1;
  background: rgba(255,255,255,0.9);
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
  text-align: center;
  transition: transform 0.3s ease;
}
.chart-item:hover {
  transform: translateY(-4px);
}

.chart-item h4 {
  margin: 0 0 10px 0;
  color: #2c3e50;
  font-size: 14px;
  font-weight: 600;
}

.chart-number {
  font-size: 26px;
  font-weight: bold;
  color: #3498db;
  text-shadow: 0 1px 5px rgba(0,0,0,0.2);
}

.chart-label {
  font-size: 12px;
  color: #03090aff;
  margin-top: 5px;
}
</style>
</head>
<body>

<?php
include 'includes/db.php'; // Database connection

// Fetch real statistics from database
// Total Bookings
$totalBookings = $conn->query("
    SELECT COUNT(*) as total FROM (
        SELECT id FROM safaribookings 
        UNION ALL 
        SELECT booking_id FROM tourbookings 
        UNION ALL 
        SELECT id FROM transport_booking
    ) as combined
")->fetch_assoc()['total'];

// Total Customers (unique emails)
$totalCustomers = $conn->query("
    SELECT COUNT(DISTINCT email) as total FROM (
        SELECT email FROM safaribookings 
        UNION ALL 
        SELECT email FROM tourbookings 
        UNION ALL 
        SELECT email FROM transport_booking
    ) as combined_emails
")->fetch_assoc()['total'];

// Pending Approvals
$pendingApprovals = $conn->query("
    SELECT COUNT(*) as total FROM (
        SELECT id FROM safaribookings WHERE status = 'pending'
        UNION ALL 
        SELECT booking_id FROM tourbookings WHERE status = 'pending'
        UNION ALL 
        SELECT id FROM transport_booking WHERE status = 'pending'
    ) as pending
")->fetch_assoc()['total'];

// Today's Bookings
$today = date('Y-m-d');
$todayBookings = $conn->query("
    SELECT COUNT(*) as total FROM (
        SELECT id FROM safaribookings WHERE DATE(created_at) = '$today'
        UNION ALL 
        SELECT booking_id FROM tourbookings WHERE DATE(created_at) = '$today'
        UNION ALL 
        SELECT id FROM transport_booking WHERE DATE(created_at) = '$today'
    ) as today
")->fetch_assoc()['total'];

// Revenue (assuming average prices - you can adjust these)
$safariRevenue = $conn->query("SELECT COUNT(*) as count FROM safaribookings WHERE status = 'confirmed'")->fetch_assoc()['count'] * 150;
$tourRevenue = $conn->query("SELECT COUNT(*) as count FROM tourbookings WHERE status = 'confirmed'")->fetch_assoc()['count'] * 80;
$transportRevenue = $conn->query("SELECT COUNT(*) as count FROM transport_booking WHERE status = 'confirmed'")->fetch_assoc()['count'] * 50;
$totalRevenue = $safariRevenue + $tourRevenue + $transportRevenue;

// Booking type distribution
$safariCount = $conn->query("SELECT COUNT(*) as count FROM safaribookings")->fetch_assoc()['count'];
$tourCount = $conn->query("SELECT COUNT(*) as count FROM tourbookings")->fetch_assoc()['count'];
$transportCount = $conn->query("SELECT COUNT(*) as count FROM transport_booking")->fetch_assoc()['count'];
?>

  <!-- Sidebar -->
  <div id="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="admin.php" class="active">Welcome</a></li>
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
          // Default dashboard overview with real data
          ?>
          <h1>Welcome, Admin!</h1>
          <p>Overview of the system and quick statistics:</p>

          <div class="cards">
            <div class="card">
              <h3>Total Bookings</h3>
              <p><?php echo $totalBookings; ?></p>
            </div>
            <div class="card card-small">
              <h3>Total Customers</h3>
              <p><?php echo $totalCustomers; ?></p>
            </div>
            <div class="card card-success">
              <h3>Today's Bookings</h3>
              <p><?php echo $todayBookings; ?></p>
            </div>
            <div class="card card-warning">
              <h3>Pending Approvals</h3>
              <p><?php echo $pendingApprovals; ?></p>
            </div>
          </div>

          <div class="mini-chart">
            <div class="chart-item">
              <h4>Safari Bookings</h4>
              <div class="chart-number"><?php echo $safariCount; ?></div>
              <div class="chart-label">Total</div>
            </div>
            <div class="chart-item">
              <h4>Tour Bookings</h4>
              <div class="chart-number"><?php echo $tourCount; ?></div>
              <div class="chart-label">Total</div>
            </div>
            <div class="chart-item">
              <h4>Transport Bookings</h4>
              <div class="chart-number"><?php echo $transportCount; ?></div>
              <div class="chart-label">Total</div>
            </div>
            <div class="chart-item">
              <h4>Estimated Revenue</h4>
              <div class="chart-number">$<?php echo number_format($totalRevenue); ?></div>
              <div class="chart-label">Total</div>
            </div>
          </div>

          <!-- Quick Stats Table -->
          <div style="margin-top: 30px; background: black; padding: 20px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <h3 style="margin-top: 0;" >Booking Status Overview</h3>
            <table style="width: 100%; border-collapse: collapse;">
              <thead>
                <tr style="background: #263646ff;">
                  <th style="padding: 12px; text-align: left; border-bottom: 2px solid #232367ff;">Service Type</th>
                  <th style="padding: 12px; text-align: center; border-bottom: 2px solid #232367ff;">Pending</th>
                  <th style="padding: 12px; text-align: center; border-bottom: 2px solid #232367ff;">Confirmed</th>
                  <th style="padding: 12px; text-align: center; border-bottom: 2px solid #232367ff;">Cancelled</th>
                  <th style="padding: 12px; text-align: center; border-bottom: 2px solid #232367ff;">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Get status counts for each service type
                $services = [
                  'safari' => 'safaribookings',
                  'tour' => 'tourbookings',
                  'transport' => 'transport_booking'
                ];
                
                foreach ($services as $name => $table) {
                  $statusCounts = $conn->query("
                    SELECT status, COUNT(*) as count 
                    FROM $table 
                    GROUP BY status
                  ");
                  
                  $counts = ['pending' => 0, 'confirmed' => 0, 'cancelled' => 0];
                  while ($row = $statusCounts->fetch_assoc()) {
                    $counts[$row['status']] = $row['count'];
                  }
                  
                  $total = array_sum($counts);
                  
                  echo "<tr>
                    <td style='padding: 12px; border-bottom: 1px solid #4f6b87ff;'>" . ucfirst($name) . "</td>
                    <td style='padding: 12px; text-align: center; border-bottom: 1px solid #4f6b87ff;'>{$counts['pending']}</td>
                    <td style='padding: 12px; text-align: center; border-bottom: 1px solid #4f6b87ff;'>{$counts['confirmed']}</td>
                    <td style='padding: 12px; text-align: center; border-bottom: 1px solid #4f6b87ff;'>{$counts['cancelled']}</td>
                    <td style='padding: 12px; text-align: center; border-bottom: 1px solid #4f6b87ff; font-weight: bold;'>$total</td>
                  </tr>";
                }
                ?>
              </tbody>
            </table>
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

// Fade in animation
document.addEventListener('DOMContentLoaded', function() {
  const fadeElements = document.querySelectorAll('.fade');
  fadeElements.forEach(el => {
    setTimeout(() => {
      el.classList.add('show');
    }, 100);
  });
});
</script>
</body>
</html>