<?php
include 'includes/db.php'; // Database connection

// Fetch Tours
$tourBookings = $conn->query("SELECT * FROM tourbookings ORDER BY created_at DESC");

// Fetch Safari
$safariBookings = $conn->query("SELECT * FROM safaribookings ORDER BY created_at DESC");
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
  color: #1abc9c;
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
  color: #1abc9c;
  font-weight: 500;
}

/* Status Badges */
.status-badge {
  display: inline-block;
  padding: 4px 10px;
  border-radius: 12px;
  font-size: 12px;
  font-weight: 500;
  margin-left: 8px;
}

.status-pending {
  background-color: rgba(241, 196, 15, 0.2);
  color: #f1c40f;
  border: 1px solid rgba(241, 196, 15, 0.4);
}

.status-confirmed {
  background-color: rgba(46, 204, 113, 0.2);
  color: #2ecc71;
  border: 1px solid rgba(46, 204, 113, 0.4);
}

.status-cancelled {
  background-color: rgba(231, 76, 60, 0.2);
  color: #e74c3c;
  border: 1px solid rgba(231, 76, 60, 0.4);
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
.btn-whatsapp {
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
  background: rgba(26, 188, 156, 0.2);
  color: #1abc9c;
  border: 1px solid rgba(26,188,156,0.5);
}

.btn-approve:hover {
  background: #1abc9c;
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

/* Responsive */
@media (max-width: 480px) {
  .booking-card {
    padding: 15px;
  }
  .btn-approve,
  .btn-cancel,
  .btn-whatsapp {
    font-size: 13px;
    padding: 7px 12px;
  }
}
</style>
<!-- Main Content -->
<div class="main-content2">
  <h1>Tours & Safari Management</h1>
  <p>Here admin can view, approve, cancel, and contact tourists.</p>

  <!-- Tours Section -->
  <h2>Tour Bookings</h2>
  <div class="booking-container">
    <?php while($tour = $tourBookings->fetch_assoc()): 
      $statusClass = 'status-' . $tour['status'];
    ?>
      <div class="booking-card">
        <h3>
          <?php echo htmlspecialchars($tour['name']); ?>
          <span class="status-badge <?php echo $statusClass; ?>">
            <?php echo ucfirst($tour['status']); ?>
          </span>
        </h3>
        <div class="booking-info">
          <p><b>Email:</b> <?php echo $tour['email']; ?></p>
          <p><b>WhatsApp:</b> <?php echo $tour['whatsapp']; ?></p>
          <p><b>Date:</b> <?php echo $tour['tour_date']; ?></p>
          <p><b>People:</b> <?php echo $tour['people']; ?></p>
          <p><b>Preferences:</b> <?php echo $tour['preferences']; ?></p>
          <p><b>Selected Tours:</b> <?php echo $tour['selected_tours']; ?></p>
          <p><b>Booked On:</b> <?php echo $tour['created_at']; ?></p>
        </div>
        <div class="booking-actions">
          <?php if ($tour['status'] != 'confirmed'): ?>
            <form method="post" action="update_booking.php">
              <input type="hidden" name="booking_id" value="<?php echo $tour['booking_id']; ?>">
              <input type="hidden" name="type" value="tour">
              <button type="submit" name="approve" class="btn-approve">Approve</button>
            </form>
          <?php endif; ?>
          
          <?php if ($tour['status'] != 'cancelled'): ?>
            <form method="post" action="update_booking.php">
              <input type="hidden" name="booking_id" value="<?php echo $tour['booking_id']; ?>">
              <input type="hidden" name="type" value="tour">
              <button type="submit" name="cancel" class="btn-cancel">Cancel</button>
            </form>
          <?php endif; ?>
          
          <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $tour['whatsapp']); ?>" target="_blank" class="btn-whatsapp">WhatsApp</a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <!-- Safari Section -->
  <h2>Safari Bookings</h2>
  <div class="booking-container">
    <?php while($safari = $safariBookings->fetch_assoc()): 
      $statusClass = 'status-' . $safari['status'];
    ?>
      <div class="booking-card">
        <h3>
          <?php echo htmlspecialchars($safari['name']); ?>
          <span class="status-badge <?php echo $statusClass; ?>">
            <?php echo ucfirst($safari['status']); ?>
          </span>
        </h3>
        <div class="booking-info">
          <p><b>Email:</b> <?php echo $safari['email']; ?></p>
          <p><b>WhatsApp:</b> <?php echo $safari['whatsapp']; ?></p>
          <p><b>Date:</b> <?php echo $safari['safari_date']; ?></p>
          <p><b>People:</b> <?php echo $safari['people']; ?></p>
          <p><b>Preferences:</b> <?php echo $safari['requests']; ?></p>
          <p><b>Safari:</b> <?php echo $safari['selected_safari']; ?></p>
          <p><b>Booked On:</b> <?php echo $safari['created_at']; ?></p>
        </div>
        <div class="booking-actions">
          <?php if ($safari['status'] != 'confirmed'): ?>
            <form method="post" action="update_booking.php">
              <input type="hidden" name="id" value="<?php echo $safari['id']; ?>">
              <input type="hidden" name="type" value="safari">
              <button type="submit" name="approve" class="btn-approve">Approve</button>
            </form>
          <?php endif; ?>
          
          <?php if ($safari['status'] != 'cancelled'): ?>
            <form method="post" action="update_booking.php">
              <input type="hidden" name="id" value="<?php echo $safari['id']; ?>">
              <input type="hidden" name="type" value="safari">
              <button type="submit" name="cancel" class="btn-cancel">Cancel</button>
            </form>
          <?php endif; ?>
          
          <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $safari['whatsapp']); ?>" target="_blank" class="btn-whatsapp">WhatsApp</a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>