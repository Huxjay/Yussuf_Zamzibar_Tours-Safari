oky now is like this one on the front page we have multiple cards like this 


for tours 


<!-- Card -->



<div class="tour-card" data-tour="sunset-dhow-cruise">
  <img src="./assets/images/tours/Sunset-Dhow-Cruise-04.jpg" alt="Sunset Dhow Cruise Zanzibar">
  <h3>Sunset Dhow Cruise Zanzibar</h3>
  <a href="#" class="view-tour-btn">View Tour</a>
</div>

    <!-- other cards down here -->



for safari 


    <div class="safari-card" data-safari="serengeti-tarangire-ngorongoro-4days">
      <img src="./assets/images/safari/serengeti tarangire and ngorongoro.jpg" alt="Serengeti, Tarangire & Ngorongoro - 4 Days / 3 Nights Safari">
      <h3>Serengeti, Tarangire & Ngorongoro</h3>
      <p class="safari-subtitle">(4 Days / 3 Nights Safari)</p>
      <div class="card-buttons">
        <a href="#" class="view-safari-btn">View Safari</a>
        <a href="safaribooking-page.php?safari=serengeti-tarangire-ngorongoro-4days" class="book-safari-btn">Book Now</a>
      </div>
    </div>


    <!-- other cards down here -->


    whene the view tour or safari clicked there is pop up and the the description and all other obout there tour is there 

    so on description there is two things that are change acoording to the time and conditon that are price and gallarey,


    so what i want is that the admin to have ability to add picture or remove also admin can edddit the price 


    the those description are looking like this one 


    toursData["sunset-dhow-cruise"] = {
  overview: `
    <h2>Overview</h2>
    <p>Are you ready for an unforgettable experience that perfectly captures the magic of Zanzibar?</p>
    <p>Let me tell you about our Sunset Dhow Cruise – it’s not just a tour; it’s a moment you’ll treasure forever.</p>
    <p>The golden sun slowly dipping into the horizon, the sky painted in shades of fiery orange, pink, and deep purple.</p>
    <p>The warm ocean breeze brushing against your skin, the gentle sway of a traditional dhow boat gliding over the calm waters of the Indian Ocean.</p>
    <p>Whether you’re a romantic couple, a solo traveler seeking tranquility, or a group of friends wanting to celebrate life, this cruise is made for you!</p>
    <h3>What to Expect</h3>
    <ul>
      <li><strong>Golden Hour Views:</strong> Witness the sun casting its final glow over the historical skyline of Stone Town.</li>
      <li><strong>Sail on a Traditional Dhow:</strong> Authentic, elegant, and smooth sailing on a handcrafted wooden boat.</li>
      <li><strong>Drinks & Music:</strong> Refreshing beverages with soothing Taarab music or the ocean’s natural rhythm.</li>
      <li><strong>Magical Ambiance:</strong> Dip your toes in the water, take stunning photos, or simply relax.</li>
    </ul>
    <h3>Booking & Transport</h3>
    <p>Book online, via WhatsApp, or by phone. Flexible payments (credit cards, bank transfer, cash) and hotel transfers included.</p>
  `,
  itinerary: `
    <h2>Sunset Dhow Cruise Itinerary</h2>
    <p>Get ready for a magical evening on the waters of Stone Town.</p>
    <h4>Starting Point:</h4>
    <p>Stone Town Beach | <strong>Start Time:</strong> 4:30 pm | <strong>Duration:</strong> ~3 hours</p>
    <ol>
      <li><strong>Hotel Pickup:</strong> Air-conditioned transfer from your hotel.</li>
      <li><strong>Boarding:</strong> Warm welcome aboard a traditional wooden dhow.</li>
      <li><strong>Sunset Sailing:</strong> Glide over calm waters with drinks, snacks, and music.</li>
      <li><strong>Golden Hour:</strong> Capture breathtaking views of the sunset.</li>
      <li><strong>Return to Shore:</strong> Enjoy the peaceful night sea atmosphere.</li>
      <li><strong>Hotel Drop-Off:</strong> Safe transfer back to your hotel.</li>
    </ol>
  `,
  price: `
    <h2>Price</h2>
    <p><strong>$40 per person</strong> (includes drinks, snacks, and hotel transfers)</p>
  `,
  includes: `
    <h2>Includes</h2>
    <ul>
      <li>Hotel pickup & drop-off</li>
      <li>Traditional dhow cruise</li>
      <li>Snacks & drinks</li>
      <li>Music & entertainment</li>
      <li>Friendly crew & guide</li>
    </ul>
  `,
  gallery: [
    "./assets/images/tours/Sunset-Dhow-Cruise-01.jpg",
    "./assets/images/tours/Sunset-Dhow-Cruise-02.jpg",
    "./assets/images/tours/Sunset-Dhow-Cruise-03.jpg",
    "./assets/images/tours/Sunset-Dhow-Cruise-04.jpg"
  ],
  faq: `
    <h2>FAQ</h2>
    <p><strong>Q:</strong> Is transport included?<br><strong>A:</strong> Yes, roundtrip hotel transfers are included.</p>
    <p><strong>Q:</strong> Are drinks provided?<br><strong>A:</strong> Yes, we offer soft drinks, local beer, wine, and water.</p>
    <p><strong>Q:</strong> Can children join?<br><strong>A:</strong> Yes, it’s a family-friendly tour.</p>
  `
};

same for safari 



















front end for admin will be like this one 

every tour and safari are in card with two button "price" and "gallary" when price clicked the card pop up then the admin can eddit the the price about the tour or sasfari,
then when gallary clicked the pop come with all image in grid form with delete button , then down there on cad there is button to add new image 



so it means we will have the table on backend with name of the tour  or safari,with price column and gallary 


IS LIKE THAT all of my ears listening to you now ,lets go


