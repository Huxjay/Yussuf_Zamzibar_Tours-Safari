<!-- Example Tour Card -->
<div class="admin-card">
  <h3>Sunset Dhow Cruise</h3>
  <p><strong>Price:</strong> $40</p>
  <div class="admin-actions">
    <button class="btn-price" data-type="tour" data-id="1">Edit Price</button>
    <button class="btn-gallery" data-type="tour" data-id="1">Manage Gallery</button>
  </div>
</div>


<!-- Example Safari Card -->
<div class="admin-card">
  <h3>Serengeti, Tarangire & Ngorongoro</h3>
  <p><strong>Price:</strong> $500</p>
  <div class="admin-actions">
    <button class="btn-price" data-type="safari" data-id="2">Edit Price</button>
    <button class="btn-gallery" data-type="safari" data-id="2">Manage Gallery</button>
  </div>
</div>


<!-- Price Modal -->
<div id="priceModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Edit Price</h2>
    <form id="priceForm">
      <input type="hidden" name="id" id="priceItemId">
      <input type="hidden" name="type" id="priceItemType">
      <label for="newPrice">New Price:</label>
      <input type="number" step="0.01" name="newPrice" id="newPrice" required>
      <button type="submit">Save</button>
    </form>
  </div>
</div>

<!-- Gallery Modal -->
<div id="galleryModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Manage Gallery</h2>
    <div id="galleryGrid" class="gallery-grid"></div>
    <form id="uploadForm" enctype="multipart/form-data">
      <input type="file" name="image" accept="image/*" required>
      <input type="hidden" name="id" id="galleryItemId">
      <input type="hidden" name="type" id="galleryItemType">
      <button type="submit">Upload</button>
    </form>
  </div>
</div>


<script>

// ================= PRICE MODAL =================
document.querySelectorAll(".btn-price").forEach(btn => {
  btn.addEventListener("click", function() {
    let id = this.getAttribute("data-id");
    let type = this.getAttribute("data-type");

    // Fill hidden inputs
    document.getElementById("priceItemId").value = id;
    document.getElementById("priceItemType").value = type;

    // Show modal
    document.getElementById("priceModal").style.display = "block";
  });
});

// ================= GALLERY MODAL =================
document.querySelectorAll(".btn-gallery").forEach(btn => {
  btn.addEventListener("click", function() {
    let id = this.getAttribute("data-id");
    let type = this.getAttribute("data-type");

    // Fill hidden inputs
    document.getElementById("galleryItemId").value = id;
    document.getElementById("galleryItemType").value = type;

    // Clear grid first
    document.getElementById("galleryGrid").innerHTML = "<p>Loading images...</p>";

    // Show modal
    document.getElementById("galleryModal").style.display = "block";

    // Fetch gallery images dynamically
    fetch(`get_gallery.php?id=${id}&type=${type}`)
      .then(res => res.json())
      .then(images => {
        let html = "";
        if (images.length > 0) {
          images.forEach(img => {
            html += `
              <div class="gallery-item">
                <img src="${img.url}" alt="">
                <button class="delete-img-btn" data-id="${id}" data-type="${type}" data-img="${img.url}">Delete</button>
              </div>
            `;
          });
        } else {
          html = "<p>No images yet.</p>";
        }
        document.getElementById("galleryGrid").innerHTML = html;
      })
      .catch(err => {
        console.error(err);
        document.getElementById("galleryGrid").innerHTML = "<p>⚠ Error loading images.</p>";
      });
  });
});

// ================= MODAL CLOSE =================
document.querySelectorAll(".modal .close").forEach(btn => {
  btn.addEventListener("click", function() {
    this.closest(".modal").style.display = "none";
  });
});

window.addEventListener("click", function(e) {
  if (e.target.classList.contains("modal")) {
    e.target.style.display = "none";
  }
});



// Price form submit
document.getElementById("priceForm").addEventListener("submit", function(e) {
  e.preventDefault();

  let formData = new FormData(this);

  fetch("update_price.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if(data.status === "success") {
      alert("✅ Price updated to $" + data.newPrice);
      // Update card price text dynamically
      let card = document.querySelector(`.admin-card button[data-id="${formData.get("id")}"][data-type="${formData.get("type")}"]`).closest(".admin-card");
      card.querySelector("p").innerHTML = "<strong>Price:</strong> $" + data.newPrice;
      document.getElementById("priceModal").style.display = "none";
    } else {
      alert("❌ " + data.message);
    }
  })
  .catch(err => console.error(err));
});

</script>