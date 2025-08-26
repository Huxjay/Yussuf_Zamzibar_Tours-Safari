<?php
include 'includes/db.php'; // Database connection

// Fetch Transport Bookings
$transportBookings = $conn->query("SELECT * FROM transport_booking ORDER BY created_at DESC");
?>
<style>
/* ====== Booking Cards ====== */
.booking-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 25px;
  margin-top: 20px;
}

.booking-card {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(25px) saturate(180%);
  -webkit-backdrop-filter: blur(25px) saturate(180%);
  border-radius: 18px;
  padding: 20px;
  box-shadow: 0 20px 45px rgba(0, 0, 0, 0.35);
  border: 1px solid rgba(255,255,255,0.15);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.booking-card:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: 0 25px 55px rgba(0,0,0,0.45);
}

.booking-card h3 {
  color: #3498db;
  font-size: 20px;
  margin-bottom: 12px;
  border-bottom: 1px solid rgba(255,255,255,0.1);
  padding-bottom: 6px;
}

.booking-info {
  margin-bottom: 15px;
}

.booking-info p {
  font-size: 14px;
  line-height: 1.6;
  color: #e0e0e0;
  margin: 4px 0;
}

.booking-info b {
  color: #3498db;
  font-weight: 500;
}

/* Actions */
.booking-actions {
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 10px;
}

.booking-actions form {
  display: inline-block;
}

/* Buttons */
.btn-approve,
.btn-cancel,
.btn-whatsapp,
.btn-delete {
  padding: 8px 14px;
  border: none;
  border-radius: 10px;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  text-decoration: none;
  transition: all 0.3s ease;
}

.btn-approve {
  background: rgba(52, 152, 219, 0.2);
  color: #3498db;
  border: 1px solid rgba(52,152,219,0.5);
}

.btn-approve:hover {
  background: #3498db;
  color: #fff;
}

.btn-cancel {
  background: rgba(231, 76, 60, 0.2);
  color: #e74c3c;
  border: 1px solid rgba(231,76,60,0.5);
}

.btn-cancel:hover {
  background: #e74c3c;
  color: #fff;
}

.btn-whatsapp {
  background: rgba(37, 211, 102, 0.2);
  color: #25d366;
  border: 1px solid rgba(37,211,102,0.5);
  display: inline-flex;
  align-items: center;
  gap: 6px;
}

.btn-whatsapp:hover {
  background: #25d366;
  color: #fff;
}

.btn-delete {
  background: rgba(155, 89, 182, 0.2);
  color: #9b59b6;
  border: 1px solid rgba(155,89,182,0.5);
}

.btn-delete:hover {
  background: #9b59b6;
  color: #fff;
}

/* Status Colors */
.status-pending { color: #f39c12; }
.status-confirmed { color: #2ecc71; }
.status-cancelled { color: #e74c3c; }

/* New Badge */
.new-badge {
  background: #e67e22;
  color: white;
  font-size: 11px;
  font-weight: bold;
  padding: 2px 8px;
  border-radius: 10px;
  margin-left: 10px;
}

/* Responsive */
@media (max-width: 480px) {
  .booking-card {
    padding: 15px;
  }
  .btn-approve,
  .btn-cancel,
  .btn-whatsapp,
  .btn-delete {
    font-size: 13px;
    padding: 7px 12px;
  }
}
</style>

<!-- Main Content -->
<div class="main-content2">
  <h1>Transport Management</h1>
  <p>Here admin can view, approve, cancel, delete, and contact transfer customers.</p>

  <!-- Transport Section -->
  <h2>Transfer Bookings</h2>
  <div class="booking-container">
    <?php while($transport = $transportBookings->fetch_assoc()): ?>
      <div class="booking-card">
        <h3>
          <?php echo htmlspecialchars($transport['name']); ?>
          <span class="status-<?php echo $transport['status']; ?>">
            <?php echo ucfirst($transport['status']); ?>
          </span>
          <?php if (strtotime($transport['created_at']) >= strtotime('-1 day')): ?>
            <span class="new-badge">NEW</span>
          <?php endif; ?>
        </h3>
        <div class="booking-info">
          <p><b>Email:</b> <?php echo htmlspecialchars($transport['email']); ?></p>
          <p><b>Phone:</b> <?php echo htmlspecialchars($transport['phone']); ?></p>
          <p><b>Pickup:</b> <?php echo htmlspecialchars($transport['pickup_location']); ?></p>
          <p><b>Drop-off:</b> <?php echo htmlspecialchars($transport['dropoff_location']); ?></p>
          <p><b>Date:</b> <?php echo htmlspecialchars($transport['booking_date']); ?></p>
          <p><b>Time:</b> <?php echo htmlspecialchars($transport['booking_time']); ?></p>
          <p><b>Booked On:</b> <?php echo $transport['created_at']; ?></p>
        </div>
        <div class="booking-actions">
          <form method="post" action="update_transport_booking.php">
            <input type="hidden" name="id" value="<?php echo $transport['id']; ?>">
            <input type="hidden" name="type" value="transport">
            <button type="submit" name="approve" class="btn-approve">Confirm</button>
          </form>
          <form method="post" action="update_transport_booking.php">
            <input type="hidden" name="id" value="<?php echo $transport['id']; ?>">
            <input type="hidden" name="type" value="transport">
            <button type="submit" name="cancel" class="btn-cancel">Cancel</button>
          </form>
          <!-- Delete -->
          <form method="post" action="delete_booking.php" onsubmit="return confirm('Delete this booking?');">
            <input type="hidden" name="id" value="<?php echo $transport['id']; ?>">
            <input type="hidden" name="type" value="transport">
            <button type="submit" class="btn-delete">Delete</button>
          </form>
          <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $transport['phone']); ?>" target="_blank" class="btn-whatsapp">WhatsApp</a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>