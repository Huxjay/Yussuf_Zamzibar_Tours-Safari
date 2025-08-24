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



// Scroll Animation Script
document.addEventListener('DOMContentLoaded', () => {
  const scrollElements = document.querySelectorAll('.scroll-animate');

  const elementInView = (el, dividend = 1.25) => {
    const elementTop = el.getBoundingClientRect().top;
    return elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend;
  };

  const displayScrollElement = (el) => {
    el.classList.add('active');
  };

  const hideScrollElement = (el) => {
    el.classList.remove('active');
  };

  const handleScrollAnimation = () => {
    scrollElements.forEach((el) => {
      if (elementInView(el, 1.25)) {
        displayScrollElement(el);
      } else {
        hideScrollElement(el);
      }
    });
  };

  window.addEventListener('scroll', () => {
    handleScrollAnimation();
  });

  // Trigger once in case some elements are in view on load
  handleScrollAnimation();
});



// JavaScript for scroll animation (using unique classes)
document.addEventListener('DOMContentLoaded', function() {
  const featureCards = document.querySelectorAll('.feature-card');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });
  
  featureCards.forEach(card => {
    observer.observe(card);
  });
});





const toursData = {
  "safari-blue": {
    overview: `
      <h2>Overview</h2>
      <p>Let us take you on our Safari Blue Tour—a signature Zanzibar experience that combines turquoise waters, stunning marine life, and breathtaking islands.</p>
      <p>Whether you’re a family, a couple, or just someone who loves adventure, this tour is the perfect way to explore the best of Zanzibar’s southern coastline.</p>
      <h3>What to Expect</h3>
      <h4>Sail Like a Local</h4>
      <p>Hop aboard a traditional Swahili dhow—a beautifully crafted wooden boat. Our crew will make sure you’re comfortable and safe as you sail across the sparkling blue waters. Feel the sun on your skin and the sea breeze in your hair—it’s magical!</p>

      <h4>Snorkeling at Stunning Reefs</h4>
      <p>Dive into Zanzibar’s vibrant coral reefs! Don’t worry if you’re new to snorkeling—we’ll provide all the gear and guide you to the best spots. You’ll see colorful fish, fascinating coral formations, and maybe even starfish.</p>

      <h4>A Stop at Kwale Island</h4>
      <p>After a morning of adventure, we’ll take you to Kwale Island, where a delicious seafood feast will be waiting. Think freshly grilled lobster, calamari, fish, and tropical fruits. Prefer vegetarian? No problem—just let us know.</p>

      <h4>Relax on a Secluded Sandbank</h4>
      <p>Imagine walking along powder-soft sand surrounded by crystal-clear water. This is your time to swim, snorkel, or just kick back and relax.</p>

      <h4>Spot Playful Dolphins</h4>
      <p>Keep an eye out for dolphins! They love to swim alongside the dhow, and watching them leap and play is an experience you won’t forget.</p>

      <h4>Explore a Peaceful Mangrove Lagoon</h4>
      <p>End your day with a calming visit to a mangrove lagoon. It’s a quiet, beautiful spot filled with fascinating wildlife and serene vibes.</p>

      <h4>Seafood Feast You’ll Love</h4>
      <p>We take lunch seriously! Enjoy the freshest seafood, grilled to perfection, along with tropical fruits and traditional dishes. If you have special dietary needs, just let us know in advance—we’ve got you covered.</p>

      <h4>Booking and Transportation</h4>
      <p>We make it super simple to book your Safari Blue adventure. You can reserve online, through WhatsApp, or just give us a call. We also offer flexible payment options, including credit cards, bank transfers, and cash.</p>
      <p>To make things even easier, we provide comfortable transport to and from your hotel, so you don’t have to worry about a thing.</p>

    `,
    itinerary: `
      <h2>Safari Blue Tour Itinerary</h2>
      <p>Here’s what your day could look like, but don’t worry—we’re super flexible and can adjust the timing to fit your schedule.</p>

      <h3>Your Day at a Glance</h3>

      <h4>Morning Pick-Up</h4>
      <p>We’ll come to your hotel to pick you up—just tell us what time works best for you! Once you’re ready, we’ll head to the beautiful village of Fumba, where your adventure begins.</p>

      <h4>Set Sail on a Traditional Dhow</h4>
      <p>At Fumba, you’ll hop aboard a traditional wooden dhow, and we’ll set sail into Zanzibar’s sparkling turquoise waters. Feel the ocean breeze as we cruise toward your first stop.</p>

      <h4>Relax at a Sandbank Paradise</h4>
      <p>Our first destination is a stunning sandbank—a perfect little slice of paradise. You can snorkel, swim, or just lounge around in the sun. We’ll provide all the snorkeling gear, and if you’re not experienced, don’t worry—our team will guide you.</p>

      <h4>Snorkeling at Coral Reefs</h4>
      <p>Next up, we’ll take you to one of Zanzibar’s most vibrant coral reefs. Dive into the clear waters and explore an underwater world filled with colorful fish and marine life. Want more time here? Just let us know!</p>

      <h4>Seafood Feast on Kwale Island</h4>
      <p>By now, you’ve probably worked up an appetite! We’ll head to Kwale Island, where a delicious Swahili-style seafood buffet will be waiting. Freshly grilled fish, lobster, calamari, and tropical fruits await you. Vegetarian? No problem—just let us know.</p>

      <h4>Explore the Mangrove Lagoon</h4>
      <p>After lunch, we’ll take you on a calm little journey through the mangrove lagoon. It’s peaceful, serene, and full of wildlife.</p>

      <h4>Relaxation and Optional Activities</h4>
      <p>Once we’re back on the beach, you can swim, climb the nearby ancient baobab tree, or just relax.</p>

      <h4>Drop-Off at Your Hotel</h4>
      <p>We’ll take you back to your hotel when the tour ends. We’re flexible, so let us know the timing that works best for you.</p>

      <h4>Why You’ll Love This Tour</h4>
      <p>It’s a mix of adventure, relaxation, and amazing Zanzibar vibes! We’re all about making sure you have the day you want—tell us what you’d like more or less of.</p>

    `,
    price: `
      <h2>Price</h2>
      <p><strong>$115 per person</strong> (includes transport ,food and soft drinks)</p>

    `,
    
    gallery: [
      "./assets/images/tours/BlueSafari/0.jpg",
      "./assets/images/tours/BlueSafari/1.jpg",
      "./assets/images/tours/BlueSafari/2.jpg",
      "./assets/images/tours/BlueSafari/3.jpg",
      "./assets/images/tours/BlueSafari/4.jpg",
      "./assets/images/tours/BlueSafari/5.jpg",
      "./assets/images/tours/BlueSafari/6.jpg",
      "./assets/images/tours/BlueSafari/8.jpg",
     
    ]
    ,
    faq: `
      <h2>FAQ</h2>
      <p><strong>Q:</strong> Is snorkeling equipment provided?<br><strong>A:</strong> Yes, everything is included.</p>
      <p><strong>Q:</strong> Can vegetarians be accommodated?<br><strong>A:</strong> Absolutely, just let us know in advance.</p>
      <p><strong>Q:</strong> How do I book?<br><strong>A:</strong> You can book online, via WhatsApp, or by phone.</p>

      
    `
  }
};


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
    <p><strong>70 per person</strong> (includes transport ,soft drinks,)</p>
  `,
  
  gallery: [
      "./assets/images/tours/sunset/0.jpg",
      "./assets/images/tours/sunset/1.jpg",
      "./assets/images/tours/sunset/2.jpg",
      "./assets/images/tours/sunset/3.jpg",
      "./assets/images/tours/sunset/4.jpg",
      "./assets/images/tours/sunset/5.jpg",
      "./assets/images/tours/sunset/6.jpg",
      "./assets/images/tours/sunset/7.jpg",
      "./assets/images/tours/sunset/8.jpg",
  ],
  faq: `
    <h2>FAQ</h2>
    <p><strong>Q:</strong> Is transport included?<br><strong>A:</strong> Yes, roundtrip hotel transfers are included.</p>
    <p><strong>Q:</strong> Are drinks provided?<br><strong>A:</strong> Yes, we offer soft drinks, local beer, wine, and water.</p>
    <p><strong>Q:</strong> Can children join?<br><strong>A:</strong> Yes, it’s a family-friendly tour.</p>
  `
};




toursData["jozani-forest-cave-swimming-tour-combination"] = {
  overview: `
    <h2>Jozani Forest & Cave Swimming Tour Combination</h2>
    <p>The perfect combination of thrill and relaxation, giving you a chance to explore Zanzibar’s only national park before diving into a secret underground cave pool!</p>
    <h3>Stop 1: Jozani Forest – Meet Zanzibar’s Famous Red Colobus Monkeys!</h3>
    <ul>
      <li>Home to rare Red Colobus Monkeys found only in Zanzibar.</li>
      <li>Walk through lush tropical forest with diverse wildlife.</li>
      <li>Explore mystical mangrove boardwalks.</li>
      <li>Discover traditional medicinal plants and unique flora.</li>
    </ul>
    <h3>Stop 2: Cave Swimming – Dive into a Hidden Gem</h3>
    <ul>
      <li>Swim in a natural underground cave with crystal-clear water.</li>
      <li>Cool off after the forest tour in refreshing freshwater pools.</li>
      <li>Learn about the cave’s history and cultural significance.</li>
    </ul>
    <h3>Why You’ll Love This Tour</h3>
    <ul>
      <li>Perfect mix of adventure & relaxation.</li>
      <li>Great for families, couples, and solo travelers.</li>
      <li>Amazing photo opportunities.</li>
      <li>Knowledgeable local guides.</li>
    </ul>
  `,
  price: `
    <h2>Price</h2>
    <p><strong>120 per person</strong> (includes transport ,soft drinks,)</p>
  `,
  
  gallery: [
    "./assets/images/tours/jozan/0.jpg",
      "./assets/images/tours/jozan/1.jpg",
      "./assets/images/tours/jozan/2.jpg",
      "./assets/images/tours/jozan/3.jpg",
      "./assets/images/tours/jozan/4.jpg",
      "./assets/images/tours/jozan/5.jpg",
      "./assets/images/tours/jozan/6.jpg",
      "./assets/images/tours/jozan/7.jpg",
      "./assets/images/tours/jozan/8.jpg",
      "./assets/images/tours/jozan/9.jpg",
  ],
  faq: `
    <h2>FAQ</h2>
    <p><strong>Q: Is the cave swimming safe?</strong><br>Yes, the water is calm and clear. Life jackets are available if needed.</p>
    <p><strong>Q: Can children join?</strong><br>Yes, but parental supervision is required.</p>
    <p><strong>Q: What should I bring?</strong><br>Swimwear, towel, sunscreen, and comfortable walking shoes.</p>
  `
};


toursData["stone-town-prison-island-nakupenda-sandbank-tour-combination"] = {
  overview: `
    <h2>Stone Town, Prison Island & Nakupenda Sandbank Tour Combination</h2>
    <p>If you’re looking for a day packed with history, wildlife, and breathtaking tropical beauty, our Stone Town, Prison Island & Nakupenda Sandbank Tour is the perfect choice!</p>
    <p>This three-in-one adventure takes you from Zanzibar’s historic streets to giant tortoises on Prison Island and finally to the dreamy white sands of Nakupenda Sandbank—all in one unforgettable day!</p>

    <h3>Stop 1: Stone Town – Walk Through Zanzibar’s Rich History</h3>
    <ul>
      <li>Explore the Old Slave Market & Anglican Cathedral.</li>
      <li>Visit the House of Wonders & Sultan’s Palace.</li>
      <li>Wander through Darajani Market.</li>
      <li>See Zanzibar’s iconic carved doors & architecture.</li>
      <li>Pass by Freddie Mercury’s House.</li>
    </ul>

    <h3>Stop 2: Prison Island – Meet the Giant Tortoises!</h3>
    <ul>
      <li>Feed and interact with Aldabra Giant Tortoises.</li>
      <li>Learn about the island’s quarantine and conservation history.</li>
      <li>Relax on the island beach with turquoise views.</li>
      <li>Snorkel around vibrant coral reefs.</li>
    </ul>

    <h3>Stop 3: Nakupenda Sandbank – A Dreamy Escape!</h3>
    <ul>
      <li>Swim in warm, shallow waters.</li>
      <li>Snorkel and explore marine life.</li>
      <li>Enjoy a fresh seafood lunch on the sandbank.</li>
      <li>Sunbathe on pristine white sand.</li>
    </ul>

    <p><em>Bonus:</em> Nakupenda means “I love you” in Swahili—fall in love with Zanzibar!</p>
  `,
  price: `
    <h2>Price</h2>
    <p><strong>150 per person</strong> (includes transport ,soft drinks,)</p>
  `,
 
  gallery: [
   "./assets/images/tours/nakupenda/0.jpg",
      "./assets/images/tours/nakupenda/1.jpg",
      "./assets/images/tours/nakupenda/2.jpg",
      "./assets/images/tours/nakupenda/3.jpg",
      "./assets/images/tours/nakupenda/4.jpg",
      "./assets/images/tours/nakupenda/5.jpg",
      "./assets/images/tours/nakupenda/7.jpg",
      "./assets/images/tours/nakupenda/8.jpg",
  ],
  faq: `
    <h2>FAQ</h2>
    <p><strong>Q: Can children join this tour?</strong><br>Yes, the tour is family-friendly and suitable for all ages.</p>
    <p><strong>Q: What should I bring?</strong><br>Comfortable shoes, swimwear, sunscreen, hat, and a camera.</p>
    <p><strong>Q: Is lunch included?</strong><br>Yes, a fresh seafood lunch is included at Nakupenda Sandbank.</p>
  `
};




toursData["nakupenda-sandbank-tour-zanzibar"] = {
  overview: `
    <h2>Overview</h2>
    <p>If you’re looking for a breathtaking escape, our Nakupenda Sandbank Tour is an absolute must.</p>
    <p>Imagine a pristine white sandbank rising from the turquoise waters, surrounded by nothing but the endless ocean. That’s Nakupenda—which literally means “I love you” in Swahili, and trust us, you’ll fall in love with this paradise too!</p>
    <p>This tour is all about relaxation, adventure, and pure tropical bliss. You’ll bask in the sun, swim in crystal-clear waters, and snorkel among vibrant marine life.</p>
    <p>And to top it all off, we’ll treat you to a fresh seafood feast right on the sandbank, with the sound of gentle waves as your background music.</p>
    <p>Whether you’re a couple looking for a romantic getaway, a solo traveler seeking tranquility, or a group of friends ready for an unforgettable experience, Nakupenda Sandbank is a place you won’t forget.</p>
    <h3>Booking and Transportation options</h3>
    <p>Booking your Nakupenda Sandbank Tour with Blue Green Zanzibar Tours is as easy as a sea breeze! Reserve your spot online using our simple booking form, send us a quick WhatsApp message, or give us a call—we’re always here to make the process smooth and hassle-free.</p>
    <p>We also offer flexible payment options to suit your needs, whether you prefer credit card, bank transfer, or cash.</p>
    <p>And don’t worry about transportation—we’ve got it covered! Enjoy a comfortable pick-up and drop-off service from your hotel, so you can fully relax and soak in the beauty of Zanzibar’s most stunning sandbank.</p>
    <p>Let us handle the details while you focus on making unforgettable memories in paradise!</p>
  `,

  itinerary: `
    <h2>Nakupenda Sandbank Trip Itinerary</h2>
    <p><strong>Duration:</strong> Half-day or full-day options available</p>
    <p><strong>Morning Departure</strong></p>
    <ul>
      <li>Your adventure begins as we pick you up from your hotel (if needed) and take you to the shore in Stone Town.</li>
      <li>Here, you’ll meet our friendly crew and board a traditional dhow boat.</li>
      <li><strong>Arrival at Nakupenda Sandbank:</strong> Step onto the soft white sand, surrounded by breathtaking blue waters. Swim, sunbathe, or simply relax and take in the stunning views.</li>
      <li>Dive into the clear waters and swim among colorful fish, sea stars, and other marine life.</li>
      <li><strong>Lunch:</strong> Enjoy a delicious seafood feast right on the sandbank — freshly grilled lobster, prawns, calamari, fish, Swahili-style rice, tropical fruits, and refreshing drinks. Vegetarian options include grilled vegetables, spiced potatoes, lentil curry, and fresh salads.</li>
      <li><strong>Free Time to Explore & Relax:</strong> Swim, take photos, or simply soak in the beauty of this hidden gem.</li>
      <li><strong>Departure to Stone Town:</strong> As the tide rises, board the boat and return to Stone Town.</li>
      <li><strong>Drop-off at Your Hotel:</strong> We’ll safely take you back, ending a perfect day in paradise!</li>
    </ul>
  `,

   price: `
    <h2>Price</h2>
    <p><strong>110 per person</strong> (includes transport ,soft drinks,)</p>
  `,

 

  gallery: [
    "./assets/images/tours/nakupenda/0.jpg",
      "./assets/images/tours/nakupenda/1.jpg",
      "./assets/images/tours/nakupenda/2.jpg",
      "./assets/images/tours/nakupenda/3.jpg",
      "./assets/images/tours/nakupenda/4.jpg",
      "./assets/images/tours/nakupenda/5.jpg",
      "./assets/images/tours/nakupenda/7.jpg",
      "./assets/images/tours/nakupenda/8.jpg",
  ],

  faq: `
    <h2>FAQs About the Nakupenda Sandbank Tour</h2>
    <p><strong>Do I need to know how to swim to join this tour?</strong><br>Not necessarily! You can still enjoy the sandbank, boat ride, and beach lunch even if you don’t swim. Life jackets are available for those who want to experience the water safely.</p>
    <p><strong>Is this tour suitable for families with children?</strong><br>Yes, families are welcome and the tour is family-friendly.</p>
    <p><strong>Do I need to book in advance?</strong><br>Booking ahead is recommended to secure your preferred date.</p>
    <p>If you have additional questions, feel free to contact us directly. We’re here to help make this tour an unforgettable experience!</p>
  `
};


toursData["village-tour-zanzibar"] = {
  overview: `
    <h2>Overview</h2>
    <p>A Village Tour in Zanzibar offers an authentic glimpse into local island life, taking you beyond the beaches to experience the rich culture and traditions of Zanzibar communities.</p>
    <p>We take you deep into a traditional Zanzibar village, where life moves at a peaceful, natural rhythm. No touristy gimmicks—just real people, real culture, and real moments.</p>
    <p>You’ll meet locals, see how they live, and even get hands-on with daily activities.</p>
    <h3>What You’ll Do:</h3>
    <ul>
      <li>Walk through the village, feeling the warm welcome as you explore narrow paths lined with mud houses, coconut trees, and smiling faces.</li>
      <li>Visit a local home to learn how traditional Swahili homes are built, decorated, and maintained.</li>
      <li>Experience daily life by watching or trying coconut husking, weaving, or grinding spices the old-fashioned way.</li>
      <li>Learn about traditional cooking by visiting a local kitchen and smelling rich Zanzibar cuisine aromas.</li>
      <li>Interact with villagers, including elders and kids, feeling the genuine island hospitality.</li>
      <li>Explore local crafts such as basket weaving, pottery, and handmade mats—perfect souvenirs!</li>
    </ul>
    <h3>Booking and Transportation</h3>
    <p>Booking your Village Tour with Blue Green Zanzibar Tours is easy! Reserve online, via WhatsApp, or by phone.</p>
    <p>Flexible payment options: credit cards, bank transfers, or cash.</p>
    <p>Comfortable transportation to/from your hotel is provided so you can relax and enjoy the experience.</p>
  `,

  itinerary: `
    <h2>Village Tour in Zanzibar – Itinerary</h2>
    <ul>
      <li><strong>Pickup from Your Hotel:</strong> Flexible timing (morning or afternoon). Enjoy a scenic drive through the island.</li>
      <li><strong>Arrival & Warm Welcome:</strong> Meet village elders and locals, learn about the village's culture and history.</li>
      <li><strong>Village Walking Tour:</strong> Explore pathways, traditional Swahili homes built with natural materials.</li>
      <li><strong>Traditional Skills & Activities:</strong> Watch/participate in coconut husking, weaving, pottery making, and spice grinding.</li>
      <li><strong>Cooking & Tasting:</strong> See traditional dishes being prepared and enjoy tasting fresh seasonal fruits and local treats.</li>
      <li><strong>Cultural Interaction & Storytelling:</strong> Chat with elders and enjoy traditional songs or drumming performances (if available).</li>
      <li><strong>Local Crafts & Souvenirs:</strong> Browse and support local artisans by purchasing handmade crafts.</li>
      <li><strong>Return Journey:</strong> Head back to your hotel with wonderful memories of your immersive village experience.</li>
    </ul>
  `,

  price: `
    <h2>Tour Price</h2>
    <ul>
      <li><strong>1-2 Persons:</strong> $55 per person</li>
      <li><strong>3-6 Persons:</strong> $45 per person</li>
      <li><strong>7-14 Persons:</strong> $40 per person</li>
      <li><strong>15-28 Persons:</strong> $35 per person</li>
      <li><strong>28+ Persons:</strong> Contact Us</li>
    </ul>
    <p><em>Important Note:</em> Transportation costs depend on your hotel’s location and are not included in the listed prices. Contact us for a tailored transfer quote.</p>
  `,

 

  gallery: [
    "./assets/images/tours/Nungwi-Cultural-Village-Tour-04.jpg",
    "./assets/images/tours/culture-tour-3.jpg",
    "./assets/images/tours/Nungwi-Cultural-Village-Tour-07.jpg",
    "./assets/images/tours/culture-tour-2.jpg",
    "./assets/images/tours/Nungwi-Cultural-Village-Tour-02.jpg",
    "./assets/images/tours/culture-tour.jpg",
    "./assets/images/tours/Nungwi-Cultural-Village-Tour-03.jpg",
    "./assets/images/tours/culture-tour-4.jpg"
  ],

  faq: `
    <h2>FAQs About the Village Tour</h2>
    <p><strong>How long does the village tour last?</strong><br>Half-day: Approx. 4–5 hours; Full-day: Around 6–7 hours (includes traditional lunch).</p>
    <p><strong>Is this tour suitable for families with kids?</strong><br>Yes, it is family-friendly and suitable for children.</p>
    <p>If you have additional questions, feel free to contact us directly. We’re here to make this tour unforgettable!</p>
  `
};


toursData["mnemba-atoll-snorkeling-trip-zanzibar"] = {
  overview: `
    <h2>Overview</h2>
    <p>Discover the breathtaking underwater world with our Mnemba Atoll Snorkeling Trip.</p>
    <p>This excursion offers the chance to explore crystal-clear waters, vibrant coral reefs, and abundant marine life.</p>
    <p>Whether you’re a pro or a first-time snorkeler, this trip is for everyone who loves the sea!</p>
    <h3>Tour Highlights</h3>
    <ul>
      <li>Boat Ride to Mnemba Atoll: Depart from Matemwe or Nungwi and cruise across turquoise waters.</li>
      <li>Snorkeling Experience: Swim among colorful coral reefs, tropical fish, sea turtles, and other marine species.</li>
      <li>Dolphin Spotting (Seasonal): Encounter playful dolphins near the atoll.</li>
      <li>Relax on a Sandbank: Sunbathe and enjoy ocean views on a nearby sandbank (tide-dependent).</li>
      <li>Fresh Fruits & Refreshments: Enjoy tropical fruits and light snacks onboard.</li>
    </ul>
    <h3>Booking & Transportation</h3>
    <p>Booking your Mnemba Atoll Snorkeling Trip with Blue Green Zanzibar Tours is easy! Reserve online, via WhatsApp, or call us.</p>
    <p>Flexible payment options including credit cards, bank transfers, and cash.</p>
    <p>We provide comfortable hotel pickup and drop-off to ensure a stress-free experience.</p>
  `,

  itinerary: `
    <h2>Mnemba Snorkeling Trip Itinerary</h2>
    <ul>
      <li><strong>Hotel Pickup:</strong> Pickup from your hotel in a comfortable, air-conditioned vehicle and scenic drive to Matemwe.</li>
      <li><strong>Boat Ride to Mnemba Atoll:</strong> Board a traditional dhow or speedboat; enjoy turquoise waters and possible dolphin sightings.</li>
      <li><strong>Snorkeling at Mnemba Atoll:</strong> Explore vibrant coral reefs with colorful fish, sea turtles, and guided underwater sights.</li>
      <li><strong>Tropical Refreshments:</strong> Relax onboard with fresh tropical fruits and cold drinks while enjoying ocean views.</li>
      <li><strong>Return Boat Ride & Hotel Drop-Off:</strong> Smooth ride back to Matemwe Beach and transfer to your hotel with wonderful memories.</li>
    </ul>
  `,

  price: `
    <h2>Price</h2>
    <p><strong>120 per person</strong> (includes transport ,soft drinks,)</p>
  `,
  

  gallery: [
    "./assets/images/tours/mnemba/0.jpg",
      "./assets/images/tours/mnemba/1.jpg",
      "./assets/images/tours/mnemba/2.jpg",
      "./assets/images/tours/mnemba/3.jpg",
      "./assets/images/tours/mnemba/4.jpg",
      "./assets/images/tours/mnemba/5.jpg",
      "./assets/images/tours/mnemba/7.jpg",
      "./assets/images/tours/mnemba/8.jpg",
      "./assets/images/tours/mnemba/9.jpg",
  ],

  faq: `
    <h2>FAQs About the Mnemba Snorkeling Trip</h2>
    <p><strong>Do I need to be an experienced swimmer?</strong><br>No! The waters are shallow and calm, perfect for beginners. Our guides provide safety briefings and assistance.</p>
    <p><strong>What marine life can I see while snorkeling?</strong><br>Colorful tropical fish, sea turtles, and vibrant coral reefs.</p>
    <p><strong>How long does the snorkeling trip last?</strong><br>The trip typically lasts several hours including transport, snorkeling, and refreshments.</p>
    <p>If you have more questions, feel free to contact us. We’re here to make your trip unforgettable!</p>
  `
};


toursData["cave-swimming-in-zanzibar"] = {
  overview: `
    <h2>Overview</h2>
    <p>Zanzibar is home to stunning natural swimming caves, perfect for a refreshing dip.</p>
    <p>The most popular spots include Kuza Cave in Jambiani, known for its crystal-clear turquoise waters and cultural significance; Swahili Cave in Jambiani, a hidden underground pool with cool, mineral-rich water; and Maalum Cave in Paje, a breathtaking natural pool with an open-top design that allows sunlight to create mesmerizing reflections.</p>
    <p>These caves offer a unique swimming experience, blending adventure, nature, and relaxation.</p>
    <h3>Kuza Cave – The Hidden Oasis</h3>
    <p>Located in the lush forest, this ancient limestone cave features shimmering turquoise water believed by locals to hold spiritual energy. It’s perfect for a refreshing dip and memorable photos.</p>
    <h3>Swahili Cave – A Secret Gem</h3>
    <p>A natural underground pool surrounded by stunning rock formations, offering cool, mineral-rich waters and a peaceful retreat off the beaten path.</p>
    <h3>Maalum Cave – The Ultimate Natural Pool</h3>
    <p>Maalum Cave feels like nature’s own luxury pool with crystal-clear water and an open-top design that lets sunlight create magical reflections. It includes a lounge area for relaxing after your swim.</p>
    <p><strong>Our preference:</strong> We highly recommend Maalum Cave for its perfect mix of adventure and relaxation.</p>
    <h3>Booking and Transportation</h3>
    <p>Booking is quick and simple through our online form, phone, or WhatsApp. Payment options include credit cards (Visa, MasterCard, Amex), bank transfers, and cash.</p>
    <p>Comfortable transport from your accommodation is provided, so you can relax and enjoy the trip.</p>
  `,

  itinerary: `
    <h2>Cave Swimming Tour – Itinerary</h2>
    <ul>
      <li><strong>Pickup:</strong> Flexible timing pickup from your hotel or villa in an air-conditioned vehicle.</li>
      <li><strong>Drive to Maalum Cave:</strong> Enjoy a scenic 30-45 minute drive through Zanzibar’s landscape to Paje.</li>
      <li><strong>Arrival & Introduction:</strong> Briefing on cave history, natural features, and swimming tips.</li>
      <li><strong>Swimming Experience:</strong> 1.5–2 hours swimming in crystal-clear mineral-rich waters, soaking sunlight reflections.</li>
      <li><strong>Relax & Refresh:</strong> Lounge area with drinks to unwind after swimming.</li>
      <li><strong>Free Time:</strong> Capture photos and explore the area.</li>
      <li><strong>Return:</strong> Drive back to your accommodation with unforgettable memories.</li>
    </ul>
  `,

  price: `
    <h2>Tour Price</h2>
    <ul>
      <li><strong>1-2 Persons:</strong> $35 per person</li>
      <li><strong>3-5 Persons:</strong> $30 per person</li>
      <li><strong>6-10 Persons:</strong> $25 per person</li>
      <li><strong>10+ Persons:</strong> Contact Us</li>
    </ul>
    <p><em>Note:</em> Transportation costs vary by hotel distance and are not included. Contact us for a customized transfer quote.</p>
  `,

 

  gallery: [
    "./assets/images/tours/Cave-swimming-Maalum-Cave.jpg",
    "./assets/images/tours/Cave-swimming-Maalum-Cave-10.jpg",
    "./assets/images/tours/Cave-Swimming-Salaam-Cave.jpg",
    "./assets/images/tours/Cave-Swimming-Maalum-cave-5.jpg",
    "./assets/images/tours/Cave-swimming-Maalum-cave-9.jpg"
  ],

  faq: `
    <h2>FAQs About Cave Swimming</h2>
    <p><strong>What are the best caves for swimming in Zanzibar?</strong><br>
    Maalum Cave (Paje), Kuza Cave (Jambiani), and Swahili Cave (Jambiani) are the top spots. We especially recommend Maalum Cave for its clear waters and relaxing lounge.</p>
    <p><strong>Can I visit multiple caves in one day?</strong><br>
    Yes, it may be possible depending on your schedule. Contact us for tailored arrangements.</p>
    <p><strong>Is cave swimming suitable for children?</strong><br>
    Yes, but please contact us for guidance on safety and age restrictions.</p>
    <p>If you have more questions, don’t hesitate to contact us! We want to make your cave swimming experience unforgettable.</p>
  `
};


toursData["swimming-with-turtles-in-zanzibar"] = {
  overview: `
    <h2>Overview</h2>
    <p>Swimming with turtles in Zanzibar is an unforgettable experience, offering a chance to get up close with these gentle creatures in crystal-clear waters.</p>
    <p>The best spot for this activity is Baraka Natural Aquarium in Nungwi, where rescued sea turtles thrive in a natural lagoon.</p>
    <p>You can swim, feed, and learn about turtle conservation efforts while enjoying the stunning coastal scenery.</p>
    <p>Suitable for all ages, this eco-friendly adventure provides a unique way to connect with marine life while supporting local conservation projects.</p>
    <h3>Why You’ll Love It</h3>
    <ul>
      <li>Get Up Close with Turtles – No cages, no stress—just you and these incredible marine animals in their natural environment.</li>
      <li>Learn & Connect – Our guides will tell you all about the turtles, their rescue stories, and the conservation efforts to protect them.</li>
    </ul>
    <h3>Booking and Transportation</h3>
    <p>Booking your swimming with turtles adventure with us is quick and easy! Reserve through our booking form, call, or WhatsApp.</p>
    <p>We offer flexible payment options including credit cards (Visa, MasterCard, American Express), bank transfers, and cash for hassle-free booking.</p>
    <p>Comfortable transportation from your accommodation is provided, so just sit back, relax, and get ready for an unforgettable encounter.</p>
  `,

  itinerary: `
    <h2>Swimming with Turtles Tour Itinerary</h2>
    <p><strong>Location:</strong> Baraka Natural Aquarium, Nungwi</p>
    <p><strong>Duration:</strong> 3–4 hours (including travel time)</p>
    <ul>
      <li><strong>Pick-Up & Transfer (Flexible Timing):</strong> Friendly driver picks you up from your accommodation and drives along scenic coastal roads to Nungwi.</li>
      <li><strong>Arrival at Baraka Natural Aquarium:</strong> Warm welcome and briefing by expert guides about turtles and conservation efforts.</li>
      <li><strong>Swimming & Feeding Session:</strong> Swim alongside gentle sea turtles in the natural lagoon and feed them by hand.</li>
      <li><strong>Free Time and Relaxation:</strong> Enjoy the surrounding area and nearby beaches.</li>
      <li><strong>Return Transfer:</strong> Relax as we drop you off at your accommodation, filled with amazing memories.</li>
    </ul>
  `,

  price: `
    <h2>Tour Price</h2>
    <ul>
      <li><strong>1-2 Persons:</strong> $35</li>
      <li><strong>6-10 Persons:</strong> $30 per person</li>
      <li><strong>11-25 Persons:</strong> $25 per person</li>
      <li><strong>25+ Persons:</strong> Contact Us</li>
    </ul>
    <p><em>Note:</em> Transportation costs depend on your hotel’s location and are not included. Contact us for a tailored transfer quote.</p>
  `,

 

  gallery: [
    "./assets/images/tours/swim-with-turtles-5.jpg",
    "./assets/images/tours/swim-with-turtles-6.jpg",
    "./assets/images/tours/swim-with-turtles-7.jpg",
    "./assets/images/tours/swim-with-turtles-8.jpg",
    "./assets/images/tours/swim-with-turtles.jpg",
    "./assets/images/tours/swim-with-turtles-3.jpg",
    "./assets/images/tours/swim-with-turtles-4.jpg",
    "./assets/images/tours/swim-with-turtles-9.jpg"
  ],

  faq: `
    <h2>FAQs About Swimming with Sea Turtles</h2>
    <p><strong>Can anyone swim with the turtles?</strong><br>Yes! Suitable for all ages and swimming levels. Non-swimmers can still wade in shallow areas and interact with turtles.</p>
    <p><strong>Is the tour ethical and eco-friendly?</strong><br>Absolutely. This tour supports local conservation efforts and prioritizes the wellbeing of turtles.</p>
    <p>If you have more questions, don’t hesitate to reach out to us. We’re here to make your swim with sea turtles experience unforgettable!</p>
  `
};

toursData["horse-riding-in-zanzibar"] = {
  overview: `
    <h2>Overview</h2>
    <p>Horse Riding Tour in Zanzibar offers a unique way to explore the island’s stunning landscapes, from pristine white-sand beaches to lush tropical trails.</p>
    <p>Suitable for all experience levels, this tour includes guided rides on well-trained horses, with options for sunrise, sunset, or daytime excursions.</p>
    <p>You can enjoy a peaceful walk, a gentle trot, or an exhilarating gallop along the shoreline, creating unforgettable memories.</p>
    <p>Safety gear is provided, and expert guides ensure a safe and enjoyable experience.</p>
    <p>Perfect for solo travelers, couples, and families, this tour is a must-do adventure in Zanzibar.</p>
    <h3>Why Will You Love This Tour?</h3>
    <ul>
      <li><strong>Ride on the Beach:</strong> Feel the thrill of riding along the shoreline as the waves gently kiss the sand. Whether beginner or experienced, it’s pure magic!</li>
      <li><strong>Sunset Rides:</strong> Opt for a breathtaking sunset ride and witness the sky painted with stunning colors.</li>
      <li><strong>Scenic Jungle Trails:</strong> Explore Zanzibar’s lush greenery, passing through coconut groves and spice-scented paths.</li>
      <li><strong>Perfect for Everyone:</strong> No prior experience needed! Friendly, well-trained horses and expert guides ensure a safe, unforgettable ride.</li>
    </ul>
    <h3>Booking & Transportation</h3>
    <p>Booking your Horse Riding Tour in Zanzibar is quick and hassle-free! Fill out our booking form or contact us via call or WhatsApp for instant assistance.</p>
    <p>Flexible payment options include credit cards (Visa, MasterCard, American Express), bank transfers, and cash payments.</p>
    <p>Comfortable transportation is provided directly from your accommodation for a stress-free journey.</p>
  `,

  price: `
    <h2>Tour Price</h2>
    <p>The actual cost of our Horse Riding Tour in Zanzibar varies based on availability and ride duration.</p>
    <p>For the latest pricing and details, please reach out to us directly. Our team is happy to assist you and tailor your horseback riding experience.</p>
  `,

 

  gallery: [
    "./assets/images/tours/horse-riding-9-768x536.jpg",
    "./assets/images/tours/horse-riding.jpg",
    "./assets/images/tours/horse-riding-6.jpg",
    "./assets/images/tours/horse-riding-8.jpg",
    "./assets/images/tours/horse-riding-5.jpg",
    "./assets/images/tours/horse-riding-4.jpg",
    "./assets/images/tours/horse-riding-3.jpg",
    "./assets/images/tours/horse-riding-10.jpg",
    "./assets/images/tours/horse-riding-2.jpg"
  ],

  faq: `
    <h2>FAQs About Horse Riding in Zanzibar</h2>
    <p><strong>Do I need prior horse riding experience?</strong><br>No experience is necessary! Our professional guides provide instructions and match you with a suitable horse based on your skill level.</p>
    <p><strong>How long does the tour last?</strong><br>The duration depends on the package you choose. Please contact us for details.</p>
    <p>If you have more questions, don’t hesitate to reach out. We’re here to make sure your horse riding experience is everything you’ve dreamed of and more.</p>
  `
};



toursData["quad-biking-in-zanzibar"] = {
  overview: `
    <h2>Overview</h2>
    <p>Experience the thrill of a quad biking tour in Zanzibar, exploring off-the-beaten-path trails through lush villages, scenic plantations, and breathtaking coastal routes.</p>
    <p>This guided adventure lets you discover authentic local culture while riding powerful, easy-to-handle quad bikes.</p>
    <p>Popular routes include areas near Kiwengwa and Nungwi, offering a mix of dirt roads, forest trails, and traditional Swahili villages.</p>
    <h3>Why You’ll Love This Tour</h3>
    <ul>
      <li>Ride through Zanzibar’s best-kept secret landscapes</li>
      <li>Meet friendly locals and experience authentic village life</li>
      <li>Snap amazing photos in stunning natural spots</li>
      <li>Beginner-friendly – no prior riding experience needed!</li>
    </ul>
    <h3>Booking and Transportation</h3>
    <p>Booking your Quad Biking Tour in Zanzibar is quick and stress-free! Reserve online or contact us via call or WhatsApp for instant assistance.</p>
    <p>Multiple payment options: credit cards (Visa, MasterCard, American Express), bank transfers, and cash payments.</p>
    <p>Comfortable transportation directly from your hotel or accommodation is provided for a smooth experience.</p>
  `,

  price: `
    <h2>Price</h2>
    <p><strong>120 per person</strong> (includes transport ,soft drinks,)</p>
  `,
 

  gallery: [
  "./assets/images/tours/baking/0.jpg",
      "./assets/images/tours/baking/1.jpg",
      "./assets/images/tours/baking/2.jpg",
      "./assets/images/tours/baking/3.jpg",
      "./assets/images/tours/baking/4.jpg",
      "./assets/images/tours/baking/5.jpg",
      "./assets/images/tours/baking/7.jpg",
      "./assets/images/tours/baking/8.jpg",
      "./assets/images/tours/baking/9.jpg",
  ],

  faq: `
    <h2>FAQs About the Quad Biking Tour</h2>
    <p><strong>Can two people share one quad bike?</strong><br>Yes! We have double-seat quad bikes, perfect for couples or friends who want to ride together.</p>
    <p><strong>What will I see on the tour?</strong><br>You’ll explore villages, plantations, coastal routes, and scenic landscapes.</p>
    <p><strong>Do I need to book in advance?</strong><br>Booking ahead is recommended to secure your preferred date and time.</p>
    <p>If you have additional questions, feel free to contact us directly. We’re here to help make this tour unforgettable!</p>
  `
};


toursData["kite-surfing-zanzibar"] = {
  overview: `
    <h2>Overview</h2>
    <p>Experience the thrill of kite surfing in Zanzibar, one of the world’s top destinations for this exhilarating watersport!</p>
    <p>Whether you’re a beginner looking to learn or an experienced rider seeking the perfect wind conditions, our kite surfing tour is designed for all skill levels.</p>
    <h3>Tour Highlights</h3>
    <ul>
      <li><strong>World-Class Kite Spots:</strong> Kite in the stunning waters of Paje, Jambiani, and Matemwe with steady winds and breathtaking beaches.</li>
      <li><strong>Ideal Wind Conditions:</strong> Side-onshore winds from December to March (Kaskazi) and June to September (Kusi) ensure perfect riding conditions.</li>
      <li><strong>Expert Coaching for All Levels:</strong> Experienced instructors guide beginners and advanced riders alike.</li>
      <li><strong>Top-Quality Equipment Rental:</strong> Latest kites, boards, harnesses, and safety gear provided.</li>
      <li><strong>Downwind Kite Safari:</strong> Enjoy an exhilarating downwind ride along Zanzibar’s coastline.</li>
      <li><strong>Flat Water & Small Waves:</strong> Perfect conditions for learning and freestyle practice.</li>
      <li><strong>Warm Tropical Waters:</strong> No wetsuits needed; enjoy crystal-clear, waist-deep water.</li>
    </ul>
    <h3>Booking & Transportation Options</h3>
    <p>Reserve your kite surfing adventure easily through our booking form, call, or WhatsApp.</p>
    <p>Multiple payment options available: credit cards (Visa, MasterCard, American Express), bank transfers, and cash.</p>
    <p>Comfortable transport from your accommodation to the kite spots is arranged for a smooth experience.</p>
  `,

  price: `
    <h2>Tour Price</h2>
    <ul>
      <li><strong>1 Hour:</strong> $80</li>
      <li><strong>Half Day:</strong> $130</li>
      <li><strong>Full Day:</strong> $170</li>
    </ul>
    <p><em>Important Note:</em> Transportation costs are not included and depend on your hotel’s location. Contact us for a tailored transfer quote.</p>
  `,

 

  gallery: [
    "./assets/images/tours/kite-surfing-4.webp",
    "./assets/images/tours/kite-surfing.jpg",
    "./assets/images/tours/kite-surfing-9.jpg",
    "./assets/images/tours/kite-surfing-8.jpg",
    "./assets/images/tours/kite-surfing-6.jpg",
    "./assets/images/tours/kite-surfing-3.jpg",
    "./assets/images/tours/kite-surfing-4.jpg",
    "./assets/images/tours/kite-surfing-5.jpg",
    "./assets/images/tours/kite-surfing-7.jpg"
  ],

  faq: `
    <h2>FAQs About Kite Surfing in Zanzibar</h2>
    <p><strong>What is the best time to kitesurf in Zanzibar?</strong><br>
    The prime kite surfing seasons are mid-June to mid-October and December to mid-March, with steady trade winds (Kusi and Kaskazi) providing ideal conditions.</p>
    <p><strong>Which are the best kite surfing spots in Zanzibar?</strong><br>
    Popular spots include Paje, Jambiani, and Matemwe, known for their perfect wind and water conditions.</p>
    <p>If you have more questions, don’t hesitate to reach out to us! We’re here to make sure your Kite Surfing experience is everything you’ve dreamed of and more.</p>
  `
};


toursData["scuba-diving-in-zanzibar"] = {
  overview: `
    <h2>Overview</h2>
    <p>We take you on an unforgettable scuba diving Zanzibar adventure.</p>
    <p>If you’re dreaming of crystal-clear waters, vibrant coral reefs, and swimming alongside sea turtles, dolphins, and colorful fish, you’re in the right place!</p>
    <h3>Why Dive with Us?</h3>
    <p>We know Zanzibar like the back of our fins! With experienced dive masters, top-notch gear, and carefully selected dive sites, we make sure you experience the absolute best of Zanzibar’s underwater world.</p>
    <p>Whether you’re a first-time diver or a seasoned pro, we tailor each trip to your skill level and comfort.</p>
    <h3>Tour Highlights</h3>
    <ul>
      <li><strong>Crystal-Clear Waters & Vibrant Coral Reefs:</strong> Dive into the warm, turquoise waters of the Indian Ocean, home to some of the most stunning coral formations.</li>
      <li><strong>Swim with Marine Life:</strong> Encounter sea turtles, dolphins, reef sharks, moray eels, and an explosion of tropical fish.</li>
    </ul>
    <h3>Booking & Transportation</h3>
    <p>Booking your scuba diving Zanzibar adventure with Blue Green Zanzibar Tours is easy. Reserve online, via WhatsApp, or call us—we’re happy to help!</p>
    <p>Flexible payment options: credit cards, bank transfers, or cash.</p>
    <p>We provide comfortable transportation to and from your hotel for a stress-free experience. Just relax and get ready to dive into Zanzibar’s breathtaking underwater world—we’ve got everything covered!</p>
  `,

  gallery: [
    "./assets/images/tours/scuba-diving-768x512.jpg",
    "./assets/images/tours/scuba-diving-2.jpg",
    "./assets/images/tours/scuba-diving-5.jpg",
    "./assets/images/tours/Scuba,Diver,Photographer,Swimming,With,The,Sea,Turtle.,Blue,Sea,.jpg",
    "./assets/images/tours/scuba-diving-3.jpg",
    "./assets/images/tours/scuba-diving-9.jpg",
    "./assets/images/tours/scuba-diving-10.jpg",
    "./assets/images/tours/scuba-diving-4.jpg",
    "./assets/images/tours/scuba-diving-9.jpg"
  ],

  price: `
    <h2>Tour Price</h2>
    <ul>
      <li><strong>Single Dive:</strong> $110</li>
      <li><strong>Double Dive with certificate:</strong> $145</li>
      <li><strong>Double Dive without certificate:</strong> $175</li>
    </ul>
    <p><em>Important Note:</em> Transportation costs are not included and depend on your hotel’s location. Please contact us for a tailored transfer quote.</p>
  `,

  
  faq: `
    <h2>FAQs About Scuba Diving in Zanzibar</h2>
    <p><strong>Do I need prior diving experience?</strong><br>
    Not at all! If you’ve never dived before, you can try our Discover Scuba Diving experience, where an instructor guides you step by step. Certified divers can choose dives suited to their skill level.</p>
    <p><strong>What are the best dive sites in Zanzibar?</strong><br>
    (Details available upon request.)</p>
    <p><strong>How deep are the dives?</strong><br>
    (Details available upon request.)</p>
    <p>If you have additional questions, feel free to contact us directly. We’re here to make this tour an unforgettable experience!</p>
  `
};



toursData["game-fishing-zanzibar"] = {
  overview: `
    <h2>Overview</h2>
    <p>Game fishing in Zanzibar offers an exciting experience for anglers looking to catch big fish in the deep waters of the Indian Ocean.</p>
    <p>The archipelago is known for its rich marine biodiversity, warm waters, and abundance of pelagic fish species, making it a top destination for sport fishing enthusiasts.</p>
    <h3>Why Fish with Us?</h3>
    <p>We’re not just about fishing—we’re about the thrill, the chase, and the ultimate experience!</p>
    <p>Whether you’re a seasoned angler or a total beginner, our expert crew and top-notch equipment will set you up for success.</p>
    <p>The waters around Zanzibar are teeming with big game fish like marlin, sailfish, tuna, dorado, wahoo, and kingfish, and we know exactly where to find them.</p>
    <h3>What to Expect on Your Trip</h3>
    <ul>
      <li><strong>A Fully Equipped Fishing Boat:</strong> Latest gear, GPS, and fish-finding technology ready for action.</li>
      <li><strong>Professional Crew:</strong> Experienced skippers and deckhands guiding you every step.</li>
      <li><strong>Top Fishing Grounds:</strong> Best deep-sea hotspots for the big catches.</li>
      <li><strong>All-Inclusive Experience:</strong> Bait, tackle, refreshments, and local secrets to help you land the catch of a lifetime.</li>
      <li><strong>Half-Day & Full-Day Charters:</strong> Choose a half-day trip for some serious fishing or a full-day charter for the full offshore adventure.</li>
    </ul>
    <h3>Booking & Transportation</h3>
    <p>Booking your Game Fishing adventure with Blue Green Zanzibar Tours is quick and hassle-free!</p>
    <p>Reserve online, via WhatsApp, or call us anytime.</p>
    <p>Flexible payment options: credit cards, bank transfers, and cash.</p>
    <p>Enjoy comfortable hotel pick-up and drop-off so you can focus on the excitement while we handle the logistics.</p>
  `,

  gallery: [
    "./assets/images/tours/fishing/0.jpg",
      "./assets/images/tours/fishing/1.jpg",
      "./assets/images/tours/fishing/2.jpg",
      "./assets/images/tours/fishing/4.jpg",
      "./assets/images/tours/fishing/5.jpg",
      "./assets/images/tours/fishing/6.jpg",
     
  ],

   price: `
    <h2>Price</h2>
    <p><strong>120 per person</strong> (includes transport ,soft drinks,)</p>
  `,

 

  faq: `
    <h2>FAQs About the Game Fishing Zanzibar Tour</h2>
    <p><strong>What types of fish can I catch in Zanzibar?</strong><br>
    Zanzibar’s waters are home to marlin (blue, black, and striped), sailfish, yellowfin tuna, dorado (mahi-mahi), wahoo, kingfish, giant trevally, and barracuda. Depending on the season, you’ll have a good chance of landing a trophy catch!</p>
    <p><strong>Do I need previous fishing experience?</strong><br>
    No prior experience is necessary. Our crew will assist you throughout the trip.</p>
    <p><strong>Can I keep the fish I catch?</strong><br>
    Policies depend on the species and local regulations. Please ask your guide for details.</p>
    <p><strong>How many people can join a fishing trip?</strong><br>
    Our boats accommodate various group sizes—contact us for specific details.</p>
    <p>If you have more questions, feel free to contact us directly. We’re here to make your Deep Sea Game Fishing Tour unforgettable!</p>
  `
};


toursData["spice-farm-stone-town-tour-combination"] = {
  overview: `
    <h2>Overview</h2>
    <p>Spice Farm & Stone Town Tour Combination is the perfect way to experience the island’s rich history, culture, and flavors—all in one unforgettable adventure!</p>

    <h3>First Stop: The Spice Farm – A Sensory Journey!</h3>
    <p>Zanzibar isn’t called the “Spice Island” for nothing!</p>
    <p>Step into a world of vibrant aromas and discover how cloves, vanilla, cinnamon, and other exotic spices grow.</p>
    <p>You’ll touch, smell, and even taste fresh spices straight from the source.</p>
    <p>Watch local farmers climb trees like acrobats to harvest fruits and spices—it’s a show on its own!</p>
    <p>Plus, get a chance to try fresh tropical fruits and learn about their amazing health benefits.</p>

    <h3>Next Up: Stone Town – A Walk Through History!</h3>
    <p>After soaking in the spice experience, we head to Stone Town, a UNESCO World Heritage Site packed with history and culture.</p>
    <p>Stroll through the maze-like alleys, marvel at the stunning carved wooden doors, and uncover stories of sultans, traders, and explorers who shaped this island.</p>
    <p>We’ll visit iconic spots like:</p>
    <ul>
      <li>The Old Slave Market – A powerful reminder of Zanzibar’s past.</li>
      <li>Freddy Mercury’s House – Birthplace of the legendary Queen singer!</li>
      <li>The House of Wonders & Sultan’s Palace Museum – A glimpse into Zanzibar’s royal history.</li>
      <li>Darajani Market – The perfect spot to see daily local life and maybe grab a souvenir or two!</li>
    </ul>

    <h3>Booking & Transportation</h3>
    <p>Booking your Spice Farm & Stone Town Tour Combination is quick and hassle-free!</p>
    <p>Simply use our booking form or reach out via call or WhatsApp for instant assistance.</p>
    <p>We offer multiple payment options including credit cards (Visa, MasterCard, American Express), bank transfers, and cash.</p>
    <p>For your convenience, comfortable transportation is provided directly from your accommodation, ensuring a smooth and stress-free experience.</p>
  `,

  gallery: [
    "./assets/images/tours/spice/0.jpg",
      "./assets/images/tours/spice/1.jpg",
      "./assets/images/tours/spice/2.jpg",
      "./assets/images/tours/spice/3.jpg",
      "./assets/images/tours/spice/4.jpg",
      "./assets/images/tours/spice/5.jpg",
      "./assets/images/tours/spice/6.jpg",
      "./assets/images/tours/spice/8.jpg",
      "./assets/images/tours/spice/9.jpg",
  ],

   price: `
    <h2>Price</h2>
    <p><strong>70 per person</strong> (includes transport ,soft drinks,)</p>
  `,
  


};

toursData["stone-town-prison-island-tour-combination"] = {
  overview: `
    <h2>Overview</h2>
    <p>Stone Town & Prison Island Tour is the perfect combo to explore the island’s fascinating history, vibrant culture, and stunning coastal scenery—all in one incredible day!</p>

    <h3>Stone Town: A Walk Through Time</h3>
    <p>We’ll start in the heart of Stone Town, a UNESCO World Heritage Site packed with history, culture, and incredible architecture.</p>
    <p>As we stroll through the narrow, winding streets, you’ll feel the mix of Arab, Persian, Indian, and European influences that make this place so unique.</p>
    <p>We’ll visit must-see spots like:</p>
    <ul>
      <li>The House of Wonders (once the grandest building in East Africa!)</li>
      <li>The Old Fort, a piece of Omani defense history</li>
      <li>The haunting yet powerful Slave Market & Memorial</li>
      <li>The Sultan’s Palace Museum, full of royal secrets</li>
      <li>The famous Zanzibar Doors—each one tells a story!</li>
    </ul>
    <p>And of course, we’ll have time to soak up the lively market scenes, sip on fresh coconut water, and maybe even shop for some unique souvenirs!</p>

    <h3>Prison Island: Nature & History Collide</h3>
    <p>After Stone Town, we’ll hop on a traditional dhow boat and cruise to Prison Island, just a 20-minute ride away.</p>
    <p>Don’t worry—no one’s been imprisoned here for ages! Instead, you’ll get to:</p>
    <ul>
      <li>Meet the giant Aldabra tortoises—some are over 100 years old!</li>
      <li>Learn about the island’s eerie past as a quarantine station</li>
      <li>Relax on the white sandy beach and take in the stunning views</li>
    </ul>

    <h3>Booking & Transportation</h3>
    <p>Booking your Stone Town & Prison Island Tour Combination is quick and hassle-free!</p>
    <p>Simply fill out our booking form or contact us via call or WhatsApp for instant assistance.</p>
    <p>We offer multiple payment options to suit your preference, including credit cards (Visa, MasterCard, American Express), bank transfers, and cash.</p>
    <p>To make your experience even smoother, we provide comfortable transportation directly from your accommodation, ensuring a stress-free and seamless adventure from start to finish.</p>
  `,

  gallery: [
    "./assets/images/tours/Stone-Town-Walking-Tour-07.jpg",
    "./assets/images/tours/Stone-Town-Walking-Tour-04.jpg",
    "./assets/images/tours/Stone-Town-Walking-Tour-08.jpg",
    "./assets/images/tours/Stone-Town-Walking-Tour-06.jpg",
    "./assets/images/tours/prison-island.jpg",
    "./assets/images/tours/Prison-Island-Tour-01.jpg",
    "./assets/images/tours/Prison-Island-Tour-06.jpg",
    "./assets/images/tours/Prison-Island-Tour-09.jpg"
  ],

  price: `
    <h2>Tour Price</h2>
    <ul>
      <li><strong>1 Person:</strong> $90</li>
      <li><strong>2 Persons:</strong> $75 per person</li>
      <li><strong>3-6 Persons:</strong> $70 per person</li>
      <li><strong>7-14 Persons:</strong> $55 per person</li>
      <li><strong>15-28 Persons:</strong> $45 per person</li>
      <li><strong>28+ Persons:</strong> Contact Us</li>
    </ul>
    <p><em>Important Note:</em> Transportation costs are not included and depend on your hotel location. Please contact us for a tailored quote.</p>
  `,

  
};


toursData["spice-farm-jozani-forest-tour-combination"] = {
  overview: `
    <h2>Overview</h2>
    <p>Spice Farm & Jozani Forest Tour is a perfect combination of nature, culture, and history—giving you the best of what this island has to offer.</p>

    <h3>Stop 1: Spice Farm – The Scent of Zanzibar</h3>
    <p>Did you know Zanzibar is called the “Spice Island”?</p>
    <p>On this tour, we’ll take you to a local spice farm where you’ll see, touch, and smell fresh spices like cinnamon, vanilla, cloves, and nutmeg—straight from the source!</p>
    <p>Our friendly guides will show you how these spices grow and how they’re used in Zanzibari cuisine, medicine, and even beauty products.</p>
    <p>Fun part? You’ll get to taste tropical fruits, drink fresh coconut water, and even get a natural perfume made from the flowers on the farm!</p>

    <h3>Stop 2: Jozani Forest – Home of the Rare Red Colobus Monkeys</h3>
    <p>After exploring the spice farm, we head to Jozani Forest, Zanzibar’s only national park and home to the endangered Red Colobus Monkeys—found nowhere else in the world!</p>
    <p>These playful little guys love to jump from tree to tree, and don’t worry, they’re super friendly and used to visitors.</p>
    <p>But Jozani isn’t just about the monkeys. You’ll also explore the mystical mangrove forest, a unique ecosystem that protects Zanzibar’s coastline.</p>
    <p>Walking along the wooden boardwalk, you’ll see crabs, birds, and even glimpse some shy bush babies if you’re lucky!</p>

    <h3>Why You’ll Love This Tour:</h3>
    <ul>
      <li>Two amazing experiences in one day – Perfect for nature and culture lovers!</li>
      <li>Expert local guides – Fun, knowledgeable, and ready to answer all your questions.</li>
      <li>Great for all ages – Whether you’re solo, a couple, or a family, this tour is a must-do.</li>
      <li>Perfect photo spots – Capture the beauty of Zanzibar’s lush forests and colorful spice farms.</li>
    </ul>

    <h3>Booking & Transportation</h3>
    <p>Booking this tour is simple and hassle-free!</p>
    <p>Just fill out our easy booking form or contact us via call or WhatsApp for instant assistance.</p>
    <p>We accept multiple payment options, including credit cards (Visa, MasterCard, American Express), bank transfers, and cash, making it convenient for you to secure your spot.</p>
    <p>To make your experience smooth and stress-free, we provide comfortable transportation directly from your accommodation—whether you’re staying in Stone Town, Nungwi, Kendwa, Paje, or beyond. Sit back, relax, and let us take care of the rest!</p>
  `,

  gallery: [
        "./assets/images/tours/farm/0.jpg",
      "./assets/images/tours/farm/1.jpg",
      "./assets/images/tours/farm/2.jpg",
      "./assets/images/tours/farm/3.jpg",
      "./assets/images/tours/farm/4.jpg",
      "./assets/images/tours/farm/5.jpg",
      "./assets/images/tours/farm/6.jpg",
      "./assets/images/tours/farm/7.jpg",
      "./assets/images/tours/farm/8.jpg",
      "./assets/images/tours/farm/9.jpg",
  ],

 price: `
    <h2>Price</h2>
    <p><strong>70 per person</strong> (includes transport ,soft drinks,)</p>
  `,
 
};

toursData["village-tour-stone-town-tour-combination"] = {
  overview: `
    <h2>Overview</h2>
    <p>If you’re looking for a tour that takes you deep into Zanzibar’s rich history and vibrant local culture, our Village & Stone Town Tour is the perfect choice!</p>
    <p>This unique experience gives you a chance to step into the daily lives of the island’s people, then explore the heart of Zanzibar’s historical capital—all in one unforgettable day.</p>

    <h3>Stop 1: Village Tour – Experience the Real Zanzibar</h3>
    <ul>
      <li>Meet the Locals – Friendly villagers will welcome you and share their daily routines.</li>
      <li>Traditional Handicrafts – Watch how locals weave baskets, carve wood, and create pottery.</li>
      <li>Visit a Local Market – If it’s market day, you’ll see how fresh produce and goods are traded.</li>
      <li>Swahili Cooking Experience – Learn how locals prepare delicious meals using fresh ingredients and spices.</li>
      <li>Cultural Activities – Join in on traditional drumming, dancing, or even a quick Swahili lesson!</li>
    </ul>

    <h3>Stop 2: Stone Town – Walk Through History</h3>
    <ul>
      <li>House of Wonders & Sultan’s Palace – Explore Zanzibar’s royal history.</li>
      <li>Old Slave Market – Visit one of the most important sites in Africa’s history.</li>
      <li>Forodhani Gardens – See where locals gather for the famous evening food market.</li>
      <li>Darajani Market – Experience the lively spice, fish, and produce market.</li>
      <li>Freddie Mercury’s House – Visit the birthplace of the legendary Queen singer!</li>
      <li>Historic Doors & Architecture – Snap photos of the beautifully carved wooden doors, a signature of Swahili culture.</li>
    </ul>

    <h3>Booking & Transportation</h3>
    <p>Reserving your Village & Stone Town Tour is simple and stress-free!</p>
    <p>Just complete our easy booking form or contact us via call or WhatsApp for quick assistance.</p>
    <p>We offer a variety of secure payment options, including credit cards (Visa, MasterCard, American Express), bank transfers, and cash, ensuring a smooth booking process.</p>
    <p>To make your experience as convenient as possible, we provide comfortable transportation straight from your accommodation. Sit back, relax, and let us take care of everything!</p>
  `,

  gallery: [
    "./assets/images/tours/Nungwi-Cultural-Village-Tour-03.jpg",
    "./assets/images/tours/nungwi-cultural-village-tour-from-nungwi-or-kendwa.5f56281db2b03-full.jpg",
    "./assets/images/tours/Nungwi-Cultural-Village-Tour-02.jpg",
    "./assets/images/tours/Nungwi-Cultural-Village-Tour-08.jpg",
    "./assets/images/tours/Stone-Town-Walking-Tour-08.jpg",
    "./assets/images/tours/Stone-Town-Walking-Tour-07.jpg",
    "./assets/images/tours/Stone-Town-Walking-Tour-06.jpg",
    "./assets/images/tours/Stone-Town-Walking-Tour-01.jpg"
  ],

  price: `
    <h2>Tour Price</h2>
    <ul>
      <li><strong>1-2 Persons:</strong> $95 per person</li>
      <li><strong>3-6 Persons:</strong> $85 per person</li>
      <li><strong>7-14 Persons:</strong> $75 per person</li>
      <li><strong>15-28 Persons:</strong> $65 per person</li>
      <li><strong>28+ Persons:</strong> Contact Us</li>
    </ul>
    <p><em>Important Note:</em> Transportation costs are not included and depend on your hotel location. Please contact us for a tailored quote.</p>
  `,


};


toursData["spice-farm-prison-island-stone-town-tour-combination"] = {
  overview: `
    <h2>Overview</h2>
    <p>Spice Farm, Prison Island & Stone Town Tour gives you the perfect mix of culture, nature, and adventure.</p>
    <p>Walk through aromatic spice farms, meet giant tortoises on Prison Island, and explore the winding alleys of historic Stone Town.</p>
    <p>This is Zanzibar at its best!</p>

    <h3>Stop 1: Spice Farm – Discover Zanzibar’s Fragrant Treasures</h3>
    <ul>
      <li>Smell, taste, and touch spices like cloves, vanilla, cinnamon, cardamom, and nutmeg.</li>
      <li>See exotic tropical fruits like jackfruit, starfruit, and passion fruit growing fresh on the trees.</li>
      <li>Learn about traditional spice farming and how Zanzibar became a global spice hub.</li>
      <li>Watch an exciting coconut-climbing show and sip on fresh coconut water!</li>
      <li>Bonus: You can even buy fresh organic spices straight from the farm to take a piece of Zanzibar home with you!</li>
    </ul>

    <h3>Stop 2: Prison Island – Meet the Legendary Giant Tortoises!</h3>
    <ul>
      <li>Get up close and feed these gentle creatures—they love attention!</li>
      <li>Learn about the island’s past as a former prison and quarantine station.</li>
      <li>Explore the island’s beautiful beaches and enjoy the stunning turquoise waters.</li>
      <li>Fun Fact: The oldest tortoise on the island is said to be over 150 years old!</li>
    </ul>

    <h3>Stop 3: Stone Town – Walk Through Zanzibar’s Living History</h3>
    <ul>
      <li>Explore historic landmarks, including the Old Slave Market & Anglican Cathedral.</li>
      <li>Visit the House of Wonders & Sultan’s Palace, symbols of Zanzibar’s royal past.</li>
      <li>Wander through Darajani Market, a lively place filled with spices, seafood, and souvenirs.</li>
      <li>See the famous Zanzibar doors, known for their intricate carvings and unique designs.</li>
      <li>Stop by Freddie Mercury’s House, the birthplace of the legendary Queen singer.</li>
      <li>Insider Tip: Don’t forget to grab a refreshing sugarcane juice or taste some local street food while exploring Stone Town!</li>
    </ul>

    <h3>Booking & Transportation</h3>
    <p>Booking your Spice Farm, Prison Island & Stone Town Tour is quick and easy!</p>
    <p>Simply fill out our booking form or contact us via call or WhatsApp for instant assistance.</p>
    <p>We offer multiple payment options, including credit cards (Visa, MasterCard, American Express), bank transfers, and cash, making it simple and secure to confirm your spot.</p>
    <p>For your convenience, we provide comfortable transportation directly from your accommodation, ensuring a seamless and stress-free experience from start to finish.</p>
  `,

  gallery: [
    "./assets/images/tours/Stone-Town-Walking-Tour-07.jpg",
    "./assets/images/tours/Stone-Town-Walking-Tour-04.jpg",
    "./assets/images/tours/Stone-Town-Walking-Tour-08.jpg",
    "./assets/images/tours/Stone-Town-Walking-Tour-06.jpg",
    "./assets/images/tours/prison-island.jpg",
    "./assets/images/tours/Prison-Island-Tour-01.jpg",
    "./assets/images/tours/Prison-Island-Tour-06.jpg",
    "./assets/images/tours/Prison-Island-Tour-09.jpg",
    "./assets/images/tours/Spice-Tour-05.jpg",
    "./assets/images/tours/Spice-Tour-08.jpg",
    "./assets/images/tours/Spice-Tour-02.jpg",
    "./assets/images/tours/Spice-Tour-07.jpg"
  ],

  price: `
    <h2>Tour Price</h2>
    <ul>
      <li><strong>1-2 Persons:</strong> $90 per person</li>
      <li><strong>3-6 Persons:</strong> $70 per person</li>
      <li><strong>7-14 Persons:</strong> $60 per person</li>
      <li><strong>15-25 Persons:</strong> $50 per person</li>
      <li><strong>25+ Persons:</strong> Contact Us</li>
    </ul>
    <p><em>Important Note:</em> Transportation costs are not included and depend on your hotel location. Please contact us for a tailored quote.</p>
  `,

 
};

toursData["spice-farm-jozani-forest-rock-restaurant-tour-combination"] = {
  overview: `
    <h2>Overview</h2>
    <p>Looking for the ultimate mix of nature, culture, and cuisine?</p>
    <p>Our Spice Farm, Jozani Forest & The Rock Restaurant Tour is a must-do experience in Zanzibar!</p>
    <p>Walk through fragrant spice farms, encounter the rare Red Colobus Monkeys in the heart of Jozani Forest, and wrap up your day with an unforgettable dining experience at The Rock Restaurant—one of the world’s most iconic restaurants, perched right in the Indian Ocean.</p>

    <h3>Stop 1: Spice Farm – Step Into Zanzibar’s Aromatic World</h3>
    <ul>
      <li>Smell, taste, and touch exotic spices like cloves, vanilla, cinnamon, nutmeg, and cardamom.</li>
      <li>See tropical fruits growing in their natural habitat—mangoes, passion fruit, and jackfruit!</li>
      <li>Watch an expert coconut tree climber in action and sip on fresh coconut water.</li>
      <li>Learn about the medicinal and culinary uses of Zanzibar’s famous spices.</li>
      <li>Bonus: You can buy freshly harvested spices and organic products directly from the farm as a perfect souvenir!</li>
    </ul>

    <h3>Stop 2: Jozani Forest – Meet Zanzibar’s Unique Wildlife</h3>
    <ul>
      <li>Walk through towering trees and lush greenery, immersing yourself in Zanzibar’s last remaining indigenous forest.</li>
      <li>Spot the friendly Red Colobus Monkeys, known for their playful nature and striking red fur.</li>
      <li>Discover the mystical mangrove boardwalk, where you’ll see crabs, fish, and unique swamp vegetation.</li>
      <li>Learn about the conservation efforts to protect Zanzibar’s wildlife and fragile ecosystems.</li>
      <li>Fun Fact: The Red Colobus Monkeys are completely fearless of humans, making it easy to observe and photograph them up close!</li>
    </ul>

    <h3>Stop 3: The Rock Restaurant – Dine in One of the Most Unique Restaurants in the World!</h3>
    <ul>
      <li>Enjoy a meal with panoramic views of the endless blue waters of the Indian Ocean.</li>
      <li>Savor fresh seafood and Swahili-inspired dishes, all made with local ingredients.</li>
      <li>Take stunning photos from the beach or arrive by boat when the tide is high!</li>
      <li>Unwind with a drink in one of the most Instagrammable locations in Zanzibar!</li>
      <li>Insider Tip: Since The Rock is a popular spot, early reservations are highly recommended to secure a table with the best views!</li>
    </ul>

    <h3>Booking & Transportation</h3>
    <p>Booking your Spice Farm, Jozani Forest & The Rock Restaurant Tour is quick and hassle-free!</p>
    <p>Simply complete our booking form or reach out via call or WhatsApp for instant assistance.</p>
    <p>We offer secure and flexible payment options, including credit cards (Visa, MasterCard, American Express), bank transfers, and cash, making it easy to confirm your reservation.</p>
    <p>To ensure a smooth and stress-free experience, we provide comfortable transportation directly from your accommodation, so you can relax and enjoy every moment of your adventure.</p>
  `,

  gallery: [
    "./assets/images/tours/Spice-Tour-07.jpg",
    "./assets/images/tours/Jozani-Forest-Tour-01.jpg",
    "./assets/images/tours/Jozani-Forest-Tour-07.jpg",
    "./assets/images/tours/Jozani-Forest-Tour-09.jpg",
    "./assets/images/tours/Dining-at-The-Rock-Zanzibar-01.jpg"
  ],

  price: `
    <h2>Tour Price</h2>
    <p>Please contact us for current pricing and group rates.</p>
    <p><em>Important Note:</em> Transportation costs are not included and depend on your hotel location. Please contact us for a tailored quote.</p>
  `,


};

toursData["mnemba-island-swimming-with-turtles-nungwi-kendwa-tour-combination"] = {
  overview: `
    <h2>Overview</h2>
    <p>Imagine a day filled with crystal-clear waters, incredible marine life, and breathtaking beaches—that’s exactly what our Mnemba Island, Swimming with Turtles & Nungwi/Kendwa Beach Tour offers!</p>
    <p>Whether you’re an ocean lover, an adventure seeker, or just looking for the perfect tropical escape, this tour is a must-do in Zanzibar.</p>

    <h3>Stop 1: Mnemba Island – Snorkel in a Marine Paradise</h3>
    <ul>
      <li>Mnemba Atoll is home to Zanzibar’s most stunning underwater world, with vibrant coral reefs and an abundance of marine life.</li>
      <li>Snorkel in the clear turquoise waters, surrounded by colorful fish, sea turtles, and even dolphins if you’re lucky!</li>
      <li>Explore the coral reefs and discover a breathtaking variety of marine species.</li>
      <li>Relax on the boat with stunning views of Mnemba Island, a private paradise off Zanzibar’s coast.</li>
      <li>Fun Fact: Mnemba Atoll is one of the top snorkeling and diving spots in East Africa!</li>
    </ul>

    <h3>Stop 2: Swim with Turtles – A Magical Wildlife Encounter</h3>
    <ul>
      <li>Visit the Nungwi Natural Aquarium, a sanctuary that rescues and rehabilitates sea turtles.</li>
      <li>Swim alongside these gentle creatures in their natural habitat!</li>
      <li>Learn about turtle conservation efforts and how these beautiful animals are protected.</li>
      <li>Experience an unforgettable up-close encounter as you feed and swim with the turtles.</li>
      <li>Insider Tip: The turtles are completely free to swim back into the ocean, making this an eco-friendly and ethical way to interact with them!</li>
    </ul>

    <h3>Stop 3: Nungwi or Kendwa Beach – Relax in Paradise</h3>
    <ul>
      <li>Unwind on the beach with a refreshing coconut or cocktail in hand.</li>
      <li>Swim in the calm, warm waters—no seaweed, just perfect beach vibes!</li>
      <li>Enjoy beachside restaurants and bars, offering delicious seafood and tropical drinks.</li>
      <li>Catch the magical sunset, as Nungwi and Kendwa have some of the best sunset views on the island.</li>
      <li>Why Kendwa & Nungwi? Unlike other beaches in Zanzibar, these spots don’t have extreme low tides, so you can swim all day long!</li>
    </ul>

    <h3>Booking & Transportation</h3>
    <p>Booking your Mnemba Island, Swimming with Turtles & Nungwi/Kendwa Beach Tour is quick and hassle-free!</p>
    <p>Simply fill out our booking form or contact us via call or WhatsApp for instant assistance.</p>
    <p>We offer multiple secure payment options, including credit cards (Visa, MasterCard, American Express), bank transfers, and cash, making it easy to confirm your spot.</p>
    <p>For your convenience, we provide comfortable transportation directly from your accommodation, ensuring a smooth and stress-free experience from start to finish.</p>
  `,

  gallery: [
           "./assets/images/tours/nungwi/0.jpg",
      "./assets/images/tours/nungwi/1.jpg",
      "./assets/images/tours/nungwi/2.jpg",
      "./assets/images/tours/nungwi/3.jpg",
      "./assets/images/tours/nungwi/4.jpg",
      "./assets/images/tours/nungwi/5.jpg",
      "./assets/images/tours/nungwi/6.jpg",
      "./assets/images/tours/nungwi/7.jpg",
      "./assets/images/tours/nungwi/8.jpg",
      "./assets/images/tours/nungwi/9.jpg",
  ],

   price: `
    <h2>Price</h2>
    <p><strong>120 per person</strong> (includes transport ,soft drinks,)</p>
  `,

  
};



toursData["horse-riding-swimming-with-turtles-nungwi-kendwa-tour-combination"] = {
  overview: `
    <h2>Overview</h2>
    <p>If you’re looking for an unforgettable mix of adventure, nature, and relaxation, this is the perfect tour for you!</p>
    <p>Imagine galloping along the beach on horseback, swimming with majestic sea turtles, and ending your day on one of Zanzibar’s most stunning beaches—all in one amazing experience!</p>
    <p>This Horse Riding, Swimming with Turtles & Nungwi/Kendwa Beach Tour is a dream come true for animal lovers, beach enthusiasts, and adventure seekers alike.</p>

    <h3>Stop 1: Horse Riding Along the Beach – Ride Through Paradise</h3>
    <ul>
      <li>Enjoy a scenic beach ride, guided by professional handlers and suited for all riding levels.</li>
      <li>Feel the thrill of riding along the shoreline, with waves splashing at your feet.</li>
      <li>Take stunning photos—this is one of the most picturesque experiences in Zanzibar!</li>
      <li>Option to ride into the shallow waters, making for a truly magical moment.</li>
      <li>No experience needed—our horses are well-trained and guides ensure safety for all.</li>
    </ul>

    <h3>Stop 2: Swim with Turtles – A Unique Wildlife Encounter</h3>
    <ul>
      <li>Visit the Nungwi Natural Aquarium, a conservation project protecting Zanzibar’s sea turtles.</li>
      <li>Swim alongside these gentle creatures in their natural habitat.</li>
      <li>Learn about turtle rescue and conservation efforts.</li>
      <li>Feed the turtles and watch them gracefully glide through the water.</li>
      <li>Eco-friendly experience: turtles are rescued and released back into the ocean.</li>
    </ul>

    <h3>Stop 3: Nungwi or Kendwa Beach – Relax in Paradise</h3>
    <ul>
      <li>Enjoy soft white sand and crystal-clear waters at either Nungwi or Kendwa Beach.</li>
      <li>Swim in warm turquoise waters with no seaweed and gentle waves.</li>
      <li>Relax under palm trees, sipping fresh coconut water or tropical cocktails.</li>
      <li>Dine at beachside restaurants offering delicious seafood and local dishes.</li>
      <li>Watch kite surfers and enjoy lively beach vibes.</li>
      <li>Nungwi & Kendwa Beaches don’t have extreme low tides, so you can swim anytime.</li>
    </ul>

    <h3>Booking & Transportation</h3>
    <p>Booking your Horse Riding, Swimming with Turtles & Nungwi/Kendwa Beach Tour is simple and hassle-free!</p>
    <p>Just fill out our booking form or contact us via call or WhatsApp for instant assistance.</p>
    <p>We provide multiple secure payment options, including credit cards (Visa, MasterCard, American Express), bank transfers, and cash, making it easy to confirm your spot.</p>
    <p>For a stress-free experience, we offer comfortable transportation directly from your accommodation, ensuring a smooth and seamless adventure from start to finish.</p>
  `,

  gallery: [
    "./assets/images/tours/nungwi-bwach-3-768x453.jpg",
    "./assets/images/tours/nungwi-beach-4.jpg",
    "./assets/images/tours/Zanzibar-Nungwi-beach.jpg",
    "./assets/images/tours/kendwa.jpg",
    "./assets/images/tours/swim-with-turtles-9.jpg",
    "./assets/images/tours/swim-with-turtles-6.jpg",
    "./assets/images/tours/swim-with-turtles-7.jpg",
    "./assets/images/tours/swim-with-turtles-3.jpg",
    "./assets/images/tours/horse-riding-2.jpg",
    "./assets/images/tours/horse-riding-4.jpg",
    "./assets/images/tours/horse-riding.jpg",
    "./assets/images/tours/horse-riding-8.jpg"
  ],

  price: `
    <h2>Tour Price</h2>
    <ul>
      <li><strong>1-2 Persons:</strong> $120 per person</li>
      <li><strong>3-6 Persons:</strong> $105 per person</li>
      <li><strong>7-14 Persons:</strong> $95 per person</li>
      <li><strong>15-25 Persons:</strong> $85 per person</li>
      <li><strong>25+ Persons:</strong> Contact Us</li>
    </ul>
    <p><em>Important Note:</em> Transportation costs are not included and depend on your hotel location. Please contact us for a tailored quote.</p>
  `,

  
};

document.querySelectorAll('.view-tour-btn').forEach(btn => {
  btn.addEventListener('click', e => {
    e.preventDefault();
    const tourKey = btn.closest('.tour-card').dataset.tour;
    openTourPopup(tourKey);
  });
});

function openTourPopup(tourKey) {
  const tour = toursData[tourKey];
  if (!tour) return;

  const tabs = [
    { key: 'overview', label: 'Overview' },
    { key: 'itinerary', label: 'Itinerary' },
    { key: 'price', label: 'Price' },
    { key: 'includes', label: 'Includes' },
    { key: 'excludes', label: 'Excludes' },
    { key: 'gallery', label: 'Gallery' },
    { key: 'faq', label: 'FAQ' }
  ];

  const availableTabs = tabs.filter(tab => {
    const content = tour[tab.key];
    if (content === undefined || content === null) return false;
    if (typeof content === 'string' && content.trim() === '') return false;
    if (Array.isArray(content) && content.length === 0) return false;
    return true;
  });

  if (availableTabs.length === 0) {
    document.getElementById('tour-popup-tabs').innerHTML = '';
    document.getElementById('tour-popup-body').innerHTML = '<p>No information available for this tour.</p>';
    document.getElementById('tour-popup').style.display = 'flex';
    return;
  }

  document.getElementById('tour-popup-tabs').innerHTML = `
    <div class="tabs">
      ${availableTabs.map(tab => `
        <button class="tab-btn" data-tab="${tab.key}">${tab.label}</button>
      `).join('')}
    </div>
  `;

  loadTourTabContent(tourKey, availableTabs[0].key);

  document.querySelectorAll('#tour-popup .tab-btn').forEach(btn => {
    btn.addEventListener('click', () => loadTourTabContent(tourKey, btn.dataset.tab));
  });

  // ✅ Update the BOOK button dynamically
  const bookBtn = document.querySelector('#tour-popup .book-btn');
  if (bookBtn) {
    bookBtn.href = `booking-page.php?tour=${encodeURIComponent(tourKey)}`;
  }

  document.getElementById('tour-popup').style.display = 'flex';
}

function loadTourTabContent(tourKey, tab) {
  const tour = toursData[tourKey];
  const popupBody = document.getElementById('tour-popup-body');

  if (tab === 'gallery') {
    let currentIndex = 0;

    function renderGallery() {
      popupBody.innerHTML = `
        <div class="gallery-container">
          <img src="${tour.gallery[currentIndex]}" class="gallery-img" alt="Gallery Image ${currentIndex + 1}">
          <div class="gallery-controls">
            <button id="prev-img">&larr;</button>
            <button id="next-img">&rarr;</button>
          </div>
        </div>
      `;

      document.getElementById('prev-img').onclick = () => {
        currentIndex = (currentIndex - 1 + tour.gallery.length) % tour.gallery.length;
        renderGallery();
      };
      document.getElementById('next-img').onclick = () => {
        currentIndex = (currentIndex + 1) % tour.gallery.length;
        renderGallery();
      };
    }

    renderGallery();
  } else {
    popupBody.innerHTML = tour[tab] || '<p>Content not available.</p>';
  }
}

















const safarisData = {
  "mikumi-national-park": {
    overview: `
      <h2>Experience Summary</h2>
      <p>This full-day safari to Mikumi National Park is ideal for travelers with limited time in Zanzibar who don't want to miss the chance to see majestic African animals in their natural habitat. With direct flights, a specialized guide, and all the facilities included, you'll enjoy an authentic safari experience—and be returned to your hotel the same day.</p>

      <h2>Trip Highlights</h2>
      <ul>
        <li>Direct flight from Zanzibar to Mikumi, saving time and avoiding long hours on the road.</li>
        <li>Complete safari in a 4×4 vehicle with an open roof, ideal for wildlife observation and photography.</li>
        <li>Opportunity to see the Big Five (including lions, elephants and buffalo), as well as giraffes, zebras, wildebeest and hippos.</li>
        <li>Picnic lunch in a natural setting, overlooking the savannah.</li>
        <li>Professional wildlife guide, fluent in English or French.</li>
        <li>Spectacular scenery, with open landscapes and rich biodiversity in the heart of Tanzania.</li>
        <li>A complete experience in just one day, ideal for those with limited time in Zanzibar.</li>
        <li>Arrive back in Zanzibar before sunset, with comfort and convenience.</li>
      </ul>
    `,
    itinerary: `
      <h2>Itinerary – 1-Day Safari with Direct Flight</h2>
      <ul>
        <li>05:30 – Transfer from the hotel in Zanzibar to the airport.</li>
        <li>06:30 – Board a direct flight to Mikumi National Park.</li>
        <li>07:45 – Arrival at the airstrip inside the park and reception by the safari guide.</li>
        <li>08:00 – 15:30 – Safari in a 4×4 jeep with open roof.</li>
        <li>In search of lions, elephants, giraffes, zebras, buffaloes, wildebeests, hippos and African birds.</li>
        <li>Picnic lunch served in a safe, scenic area within the park.</li>
        <li>15:45 – Return to the runway.</li>
        <li>16:30 – Flight back to Zanzibar.</li>
        <li>17:45 – Arrival and transfer to the hotel.</li>
      </ul>
    `,
    includes: `
      <h2>The package includes</h2>
      <ul>
        <li>Domestic roundtrip flights (Zanzibar ↔ Mikumi)</li>
        <li>Zanzibar hotel transfers (round trip)</li>
        <li>Full 4×4 Jeep Safari with professional guide (English/French)</li>
        <li>Park entrance fees and government taxes</li>
        <li>Picnic lunch</li>
        <li>Mineral water during the tour</li>
      </ul>
    `,
    excludes: `
      <h2>Does not include</h2>
      <ul>
        <li>International flights</li>
        <li>Visa and travel insurance fees</li>
        <li>Alcoholic beverages</li>
        <li>Tips for the guide</li>
        <li>Personal items</li>
      </ul>
    `,
    gallery: [
      "./assets/images/safari/mikumi/1.jpg",
      "./assets/images/safari/mikumi/2.jpg",
      "./assets/images/safari/mikumi/3.jpg",
      "./assets/images/safari/mikumi/4.jpg",
      "./assets/images/safari/mikumi/5.jpg",
      "./assets/images/safari/mikumi/6.jpg",
      "./assets/images/safari/mikumi/7.jpg",
      "./assets/images/safari/mikumi/8.jpg",
      "./assets/images/safari/mikumi/9.jpg",
      
    
    ]
  },

  "ngorongoro-tarangire-2days": {
    overview: `
      <h2>Experience Summary</h2>
      <p>Perfect for those short on time but looking for an authentic safari experience in two of Tanzania's most iconic parks.</p>
      <p>Explore the unique landscape of Tarangire National Park, famous for its baobab trees and herds of elephants, and then descend to the bottom of the extraordinary Ngorongoro Crater, home to thousands of wild animals, including the rare black rhino.</p>
      <p>This package includes round-trip domestic flights from Zanzibar, private 4x4 jeep transportation with a professional guide, comfortable full-board accommodation, and all entrance fees.</p>
      <p><strong>Ideal for:</strong> Travelers with limited time, couples, and nature lovers looking for a short but intense adventure.</p>
    `,
    itinerary: `
      <h2>Complete Itinerary</h2>
      <h3>Day 1: Tarangire Safari</h3>
      <ul>
        <li>Flight from Zanzibar to Arusha Airport</li>
        <li>Reception by our driver-guide and immediate departure to Tarangire National Park</li>
        <li>Afternoon safari among elephants, giraffes and the famous baobabs</li>
        <li>Transfer to Karatu</li>
        <li>Dinner and overnight stay on a full-board basis at Farm of Dreams Lodge or similar</li>
      </ul>
      <h3>Day 2: Ngorongoro Crater & Return</h3>
      <ul>
        <li>After breakfast, departure towards the majestic Ngorongoro Crater</li>
        <li>Safari inside the crater, home to black rhinos, lions and flamingos</li>
        <li>Picnic lunch in the park</li>
        <li>Return to Arusha Airport</li>
        <li>Flight back to Zanzibar departing at 4:45 pm</li>
      </ul>
    `,
    includes: `
      <h2>The Package Includes</h2>
      <ul>
        <li>Domestic round trip flights (Zanzibar – Arusha – Zanzibar)</li>
        <li>Airport transfer</li>
        <li>Transportation in a 4×4 Toyota Land Cruiser jeep with sunroof</li>
        <li>Professional driver-guide fluent in English and/or French</li>
        <li>Park entrance fees and government fees</li>
        <li>1.5 liters of mineral water per person per day</li>
      </ul>
    `,
    excludes: `
      <h2>Does Not Include</h2>
      <ul>
        <li>International flights</li>
        <li>Entry visa and travel insurance</li>
        <li>Tips for the guide</li>
        <li>Items of a personal nature</li>
        <li>Alcoholic beverages</li>
      </ul>
    `,
    gallery: [
      "./assets/images/safari/ngorongoro/0.jpg",
      "./assets/images/safari/ngorongoro/1.jpg",
      "./assets/images/safari/ngorongoro/2.jpg",
      "./assets/images/safari/ngorongoro/3.jpg",
      "./assets/images/safari/ngorongoro/4.jpg",
      "./assets/images/safari/ngorongoro/5.jpg",
      "./assets/images/safari/ngorongoro/6.jpg",
      "./assets/images/safari/ngorongoro/7.jpg",
      "./assets/images/safari/ngorongoro/8.jpg",
      "./assets/images/safari/ngorongoro/9.jpg",
      
    ],
    faq: `
      <h2>FAQ</h2>
      <p>Q: Are children allowed?<br>A: Yes, children are welcome but please check age restrictions with us.</p>
      <p>Q: What languages do the guides speak?<br>A: English, French, and sometimes Portuguese.</p>
      <p>Q: What should I bring?<br>A: Comfortable clothing, sunscreen, binoculars, and a camera.</p>
    `
  },


  

  "ngorongoro-tarangire-lake-manyara-3days": {
    overview: `
      <h2>Experience Summary</h2>
      <p>A memorable journey through three of northern Tanzania's most iconic destinations: Tarangire National Park, the magnificent Ngorongoro Crater, and the vibrant Lake Manyara.</p>
      <p>This itinerary is ideal for those seeking a quick but rich immersion in African nature, combining diverse landscapes with excellent wildlife observation.</p>
      <p>With domestic flights included, private 4x4 jeep transportation, experienced guides, and full board, this is a comfortable, safe, and exciting experience.</p>
      <p><strong>Ideal for:</strong> Couples, families and travelers who want to experience the best of safari in a short time.</p>

      <h2>Trip Highlights</h2>
      <ul>
        <li>Three Parks in Three Days: Experience Savannah, Forest, and Crater in One Itinerary</li>
        <li>High animal diversity from elephants in Tarangire to flamingos and tree-climbing lions at Lake Manyara</li>
        <li>Guide fluent in foreign languages: English, French and/or Portuguese</li>
        <li>Comfortable accommodation: Two nights at the Farm of Dreams Lodge with full board</li>
        <li>Personalized safari: In a 4×4 jeep with panoramic roof and private driver</li>
        <li>Optional activity: Visit to a traditional Maasai village</li>
      </ul>
    `,
    itinerary: `
      <h2>Detailed Itinerary</h2>
      <h3>Day 1: Zanzibar to Tarangire</h3>
      <ul>
        <li>Flight from Zanzibar to Arusha</li>
        <li>Direct departure to Tarangire National Park for a late afternoon game drive</li>
        <li>Transfer to Karatu</li>
        <li>Dinner and overnight at Farm of Dreams Lodge (full board)</li>
      </ul>
      <h3>Day 2: Ngorongoro Crater</h3>
      <ul>
        <li>Breakfast and departure to the Ngorongoro Conservation Area</li>
        <li>Safari inside the crater with picnic</li>
        <li>Return to the lodge in Karatu</li>
        <li>Dinner and overnight at Farm of Dreams Lodge</li>
      </ul>
      <h3>Day 3: Lake Manyara & Return</h3>
      <ul>
        <li>Morning visit to Lake Manyara National Park</li>
        <li>Transfer to Arusha Airport</li>
        <li>Return flight to Zanzibar departing at 5:00 p.m.</li>
      </ul>
    `,
    includes: `
      <h2>What's Included</h2>
      <ul>
        <li>Domestic round trip flights (Zanzibar – Arusha – Zanzibar)</li>
        <li>Transportation in a 4×4 Toyota Land Cruiser jeep with panoramic roof</li>
        <li>Professional driver-guide fluent in English and/or French</li>
        <li>All park and crater entrance fees</li>
        <li>1.5 liters of mineral water per person per day</li>
      </ul>
    `,
    excludes: `
      <h2>Does Not Include</h2>
      <ul>
        <li>International flights</li>
        <li>Visa and travel insurance fees</li>
        <li>Alcoholic beverages</li>
        <li>Tips for the guide</li>
        <li>Items of a personal nature</li>
      </ul>
    `,
    notes: `
      <h2>Important Note</h2>
      <ul>
        <li>On the day of the Stone Town tour, it is necessary to wear clothing that covers up to the knees, out of respect for the local culture.</li>
        <li>On the day of the dolphin activity in Mnemba, there will be no drone or photographer accompanying you.</li>
        <li>However, a drone will be available during the sunset dhow cruise to capture beautiful moments.</li>
        <li>On one of the days, it will not be possible to hold the special dinner on Nakupenda Island due to high tide. Instead, the tour includes lunch at Nakupenda Sandbank during the day, with beautiful decoration but without live music.</li>
      </ul>
    `,
    gallery: [
       "./assets/images/safari/manyara/0.jpg",
      "./assets/images/safari/manyara/1.jpg",
      "./assets/images/safari/manyara/2.jpg",
      "./assets/images/safari/manyara/3.jpg",
      "./assets/images/safari/manyara/4.jpg",
      "./assets/images/safari/manyara/5.jpg",
      "./assets/images/safari/manyara/6.jpg",
      "./assets/images/safari/manyara/7.jpg",
      "./assets/images/safari/manyara/8.jpg",
      "./assets/images/safari/manyara/9.jpg",
    ],
  },


  "serengeti-ngorongoro-3days": {
  overview: `
    <h2>Experience Summary</h2>
    <p>This full-day safari to Mikumi National Park is ideal for travelers with limited time in Zanzibar who don't want to miss the chance to see majestic African animals in their natural habitat. With direct flights, a specialized guide, and all the facilities included, you'll enjoy an authentic safari experience—and be returned to your hotel the same day.</p>

    <h2>Trip Highlights</h2>
    <ul>
      <li>Direct flight from Zanzibar to Mikumi, saving time and avoiding long hours on the road.</li>
      <li>Complete safari in a 4×4 vehicle with an open roof, ideal for wildlife observation and photography.</li>
      <li>Opportunity to see the Big Five (including lions, elephants and buffalo), as well as giraffes, zebras, wildebeest and hippos.</li>
      <li>Picnic lunch in a natural setting, overlooking the savannah.</li>
      <li>Professional wildlife guide, fluent in English or French.</li>
      <li>Spectacular scenery, with open landscapes and rich biodiversity in the heart of Tanzania.</li>
      <li>A complete experience in just one day, ideal for those with limited time in Zanzibar.</li>
      <li>Arrive back in Zanzibar before sunset, with comfort and convenience.</li>
    </ul>
  `,
  itinerary: `
    <h2>Itinerary – 1-Day Safari with Direct Flight</h2>
    <ul>
      <li>05:30 – Transfer from the hotel in Zanzibar to the airport.</li>
      <li>06:30 – Board a direct flight to Mikumi National Park.</li>
      <li>07:45 – Arrival at the airstrip inside the park and reception by the safari guide.</li>
      <li>08:00 – 15:30 – Safari in a 4×4 jeep with open roof.</li>
      <li>In search of lions, elephants, giraffes, zebras, buffaloes, wildebeests, hippos and African birds.</li>
      <li>Picnic lunch served in a safe, scenic area within the park.</li>
      <li>15:45 – Return to the runway.</li>
      <li>16:30 – Flight back to Zanzibar.</li>
      <li>17:45 – Arrival and transfer to the hotel.</li>
    </ul>
  `,
  includes: `
    <h2>The package includes</h2>
    <ul>
      <li>Domestic roundtrip flights (Zanzibar ↔ Mikumi)</li>
      <li>Zanzibar hotel transfers (round trip)</li>
      <li>Full 4×4 Jeep Safari with professional guide (English/French)</li>
      <li>Park entrance fees and government taxes</li>
      <li>Picnic lunch</li>
      <li>Mineral water during the tour</li>
    </ul>
  `,
  excludes: `
    <h2>Does not include</h2>
    <ul>
      <li>International flights</li>
      <li>Visa and travel insurance fees</li>
      <li>Alcoholic beverages</li>
      <li>Tips for the guide</li>
      <li>Personal items</li>
    </ul>
  `,
  gallery: [
       "./assets/images/safari/serengeti/0.jpg",
      "./assets/images/safari/serengeti/1.jpg",
      "./assets/images/safari/serengeti/2.jpg",
      "./assets/images/safari/serengeti/3.jpg",
      "./assets/images/safari/serengeti/4.jpg",
      "./assets/images/safari/serengeti/5.jpg",
      "./assets/images/safari/serengeti/6.jpg",
      "./assets/images/safari/serengeti/7.jpg",
      "./assets/images/safari/serengeti/8.jpg",
      "./assets/images/safari/serengeti/9.jpg",
  ]
},
"serengeti-tarangire-ngorongoro-4days": {
  overview: `
    <h2>Experience Summary</h2>
    <p>Embark on an unforgettable journey through three of Tanzania's most iconic safari destinations: Serengeti, Ngorongoro Crater, and Tarangire National Park. Over four days and three nights, you'll be immersed in African wildlife, stunning landscapes, and rich ecological diversity, all with the comfort and security of an experienced guide.</p>
    <p>Beginning with a scenic flight from Zanzibar to the Serengeti, you'll enjoy thrilling safaris across endless plains teeming with wildlife. On the second day, a full Serengeti safari reveals the grandeur of the savannah and the chance to spot the Big Five.</p>
    <p>On the third day, you'll descend to the famous Ngorongoro Crater, a true natural paradise, home to an impressive density of wildlife. Rounding out the adventure, Tarangire National Park will captivate you with its landscape of baobabs and elephants before returning to Zanzibar.</p>
    <p>With comfortable accommodations in select camps and lodges, full meals, and breathtaking scenery, this experience offers the best of African nature in a compact and memorable itinerary.</p>

    <h2>Trip Highlights</h2>
    <ul>
      <li>Scenic flight from Zanzibar to the Serengeti, with stunning views of the Tanzanian landscape.</li>
      <li>Unforgettable safaris in the Serengeti, home of the Great Migration and the legendary Big Five.</li>
      <li>(Optional): Sunrise balloon ride over the Serengeti, with breakfast in the savannah.</li>
      <li>Descent into the Ngorongoro Crater, considered one of the natural wonders of Africa and a UNESCO World Heritage Site.</li>
      <li>Explore Tarangire National Park, famous for its large herds of elephants and ancient baobab trees.</li>
      <li>Selected accommodations in comfortable camps and lodges, with full board.</li>
      <li>Accompaniment by a professional, experienced driver-guide fluent in English (or other languages upon request).</li>
      <li>Meals included throughout the itinerary (breakfast, lunch and dinner).</li>
      <li>Incredible photography opportunities of African wildlife and landscapes.</li>
    </ul>
  `,
  itinerary: `
    <h2>Complete Itinerary</h2>
    <h3>Day 1: Zanzibar to Serengeti</h3>
    <ul>
      <li>Take a flight from Zanzibar to the heart of the Serengeti.</li>
      <li>Reception at the airport by our specialized driver-guide.</li>
      <li>Full-day safari across the vast plains of the Serengeti.</li>
      <li>In the evening, transfer to the camp.</li>
      <li>Dinner and overnight stay on a full board basis.</li>
      <li><strong>Accommodation:</strong> Serengeti Camp (full board)</li>
    </ul>
    <h3>Day 2: Serengeti – Full Day Safari</h3>
    <ul>
      <li>Day dedicated to safari in Serengeti National Park.</li>
      <li>Explore different areas of the park in search of the Big Five and the rich wildlife.</li>
      <li>(Optional): Sunrise balloon ride with breakfast in the savannah (not included).</li>
      <li>Return to camp at the end of the day.</li>
      <li>Dinner and overnight stay.</li>
      <li><strong>Accommodation:</strong> Serengeti Camp (full board)</li>
    </ul>
    <h3>Day 3: Serengeti → Ngorongoro Crater → Karatu</h3>
    <ul>
      <li>After breakfast, departure from the Serengeti towards the Ngorongoro Conservation Area.</li>
      <li>Descent to the bottom of the Ngorongoro Crater, considered one of the natural wonders of Africa.</li>
      <li>Safari with lunch break in designated area.</li>
      <li>In the afternoon, continue to Karatu.</li>
      <li>Dinner and overnight stay at the lodge.</li>
      <li><strong>Accommodation:</strong> Lodge in Karatu (full board)</li>
    </ul>
    <h3>Day 4: Karatu → Tarangire National Park → Arusha → Zanzibar</h3>
    <ul>
      <li>After breakfast, departure for Tarangire National Park, known for its landscapes marked by baobab trees and large herds of elephants.</li>
      <li>Last safari of the trip, enjoying the region's diverse fauna.</li>
      <li>In the afternoon, transfer to Arusha Airport for your return flight to Zanzibar.</li>
    </ul>
  `,
  includes: `
    <h2>The package includes</h2>
    <ul>
      <li>Domestic roundtrip flights (Zanzibar – Serengeti / Arusha – Zanzibar)</li>
      <li>Reception at Seronera Airstrip and transfer to Arusha Airport</li>
      <li>Park entrance fees, crater fees, and government taxes</li>
      <li>Transportation in a 4×4 Toyota Land Cruiser jeep with sunroof</li>
      <li>Professional driver-guide fluent in English, French and/or Portuguese</li>
      <li>Accommodation in a family room with full board</li>
      <li>1.5L of mineral water per person per day</li>
    </ul>
  `,
  excludes: `
    <h2>Does not include</h2>
    <ul>
      <li>International flights</li>
      <li>Travel insurance and visa fees</li>
      <li>Alcoholic beverages</li>
      <li>Tips for the guide</li>
      <li>Personal expenses</li>
    </ul>
  `,
  gallery: [
      "./assets/images/safari/tarangire/0.jpg",
      "./assets/images/safari/tarangire/1.jpg",
      "./assets/images/safari/tarangire/2.jpg",
      "./assets/images/safari/tarangire/3.jpg",
      "./assets/images/safari/tarangire/4.jpg",
      "./assets/images/safari/tarangire/5.jpg",
      "./assets/images/safari/tarangire/6.jpg",
      "./assets/images/safari/tarangire/7.jpg",
      "./assets/images/safari/tarangire/8.jpg",
      "./assets/images/safari/tarangire/9.jpg",
  ]
}
};


document.querySelectorAll('.safari-card .view-safari-btn').forEach(btn => {
  btn.addEventListener('click', e => {
    e.preventDefault();
    const safariKey = btn.closest('.safari-card').dataset.safari;
    openSafariPopup(safariKey);
  });
});

function openSafariPopup(safariKey) {
  const safari = safarisData[safariKey];
  if (!safari) return;

  const tabs = [
  { key: 'overview', label: 'Overview' },
  { key: 'itinerary', label: 'Itinerary' },
  { key: 'price', label: 'Price' },
  { key: 'includes', label: 'Includes' },
  { key: 'excludes', label: 'Excludes' },   
  {key:'notes',label:'Notes'},
  { key: 'gallery', label: 'Gallery' },
  { key: 'faq', label: 'FAQ' }
];

  const availableTabs = tabs.filter(tab => {
    const content = safari[tab.key];
    if (!content) return false;
    if (typeof content === 'string' && content.trim() === '') return false;
    if (Array.isArray(content) && content.length === 0) return false;
    return true;
  });

  if (availableTabs.length === 0) {
    document.getElementById('safari-popup-tabs').innerHTML = '';
    document.getElementById('safari-popup-body').innerHTML = '<p>No information available for this safari.</p>';
    document.getElementById('safari-popup').style.display = 'flex';
    return;
  }

  document.getElementById('safari-popup-tabs').innerHTML = `
    <div class="tabs">
      ${availableTabs.map(tab => `
        <button class="tab-btn" data-tab="${tab.key}">${tab.label}</button>
      `).join('')}
    </div>
  `;

  loadSafariTabContent(safariKey, availableTabs[0].key);

  document.querySelectorAll('#safari-popup .tab-btn').forEach(btn => {
    btn.addEventListener('click', () => loadSafariTabContent(safariKey, btn.dataset.tab));
  });

  document.getElementById('safari-popup').style.display = 'flex';
}

function loadSafariTabContent(safariKey, tab) {
  const safari = safarisData[safariKey];
  const popupBody = document.getElementById('safari-popup-body');

  if (tab === 'gallery') {
    let currentIndex = 0;

    function renderGallery() {
      popupBody.innerHTML = `
        <div class="gallery-container">
          <img src="${safari.gallery[currentIndex]}" class="gallery-img" alt="Gallery Image ${currentIndex + 1}">
          <div class="gallery-controls">
            <button id="prev-img">&larr;</button>
            <button id="next-img">&rarr;</button>
          </div>
        </div>
      `;

      document.getElementById('prev-img').onclick = () => {
        currentIndex = (currentIndex - 1 + safari.gallery.length) % safari.gallery.length;
        renderGallery();
      };
      document.getElementById('next-img').onclick = () => {
        currentIndex = (currentIndex + 1) % safari.gallery.length;
        renderGallery();
      };
    }

    renderGallery();
  } else {
    popupBody.innerHTML = safari[tab] || '<p>Content not available.</p>';
  }
}



// CLOSE BUTTON


document.body.addEventListener('click', (e) => {
  if (e.target.classList.contains('close-btn')) {
    const tourPopup = document.getElementById('tour-popup');
    const safariPopup = document.getElementById('safari-popup');
    if (tourPopup) tourPopup.style.display = 'none';
    if (safariPopup) safariPopup.style.display = 'none';
  }
});
window.addEventListener('click', e => {
  if (e.target.id === 'tour-popup') {
    document.getElementById('tour-popup').style.display = 'none';
  } else if (e.target.id === 'safari-popup') {
    document.getElementById('safari-popup').style.display = 'none';
  }
});



const toggleBtn = document.getElementById("toggleSocials");
const icons = document.querySelector(".social-icons");

let autoExpand = true;

toggleBtn.addEventListener("click", () => {
  icons.classList.toggle("show");
  toggleBtn.textContent = icons.classList.contains("show") ? "×" : "+";
  autoExpand = false; // stop auto-expand when user manually interacts
});

// Auto-expand every 5 seconds if user hasn't clicked yet
setInterval(() => {
  if (autoExpand) {
    icons.classList.add("show");
    toggleBtn.textContent = "×";
    setTimeout(() => {
      icons.classList.remove("show");
      toggleBtn.textContent = "+";
    }, 2000); // stays open for 2 seconds before closing
  }
}, 5000);

document.getElementById('loginLink').addEventListener('click', function(e) {
    e.preventDefault();
    fetch('login.php')
        .then(response => response.text())
        .then(html => {
            document.getElementById('main-content').innerHTML = html;
        });
});

function flipLoginCard() {
    document.getElementById("loginCard").classList.toggle("flip");
}

// Optional: handle button clicks
document.addEventListener("DOMContentLoaded", () => {
    const loginBtn = document.getElementById("loginBtn");
    const resetBtn = document.getElementById("resetBtn");

    loginBtn.addEventListener("click", () => {
        alert("Login logic goes here");
    });

    resetBtn.addEventListener("click", () => {
        alert("Password reset logic goes here");
    });
});


// view password
function togglePassword() {
    const passwordInput = document.getElementById("passwordInput");
    const type = passwordInput.type === "password" ? "text" : "password";
    passwordInput.type = type;
}


// Handle "Book this tour" click
document.addEventListener("click", function(e) {
    if (e.target.classList.contains("bookTourBtn")) {
        e.preventDefault();
        const tourKey = e.target.dataset.tour; // get which tour button clicked

        fetch("booking-page.php?tour=" + tourKey)
            .then(response => response.text())
            .then(html => {
                document.getElementById("main-content").innerHTML = html;
                document.getElementById("main-content").scrollIntoView({ behavior: "smooth" });
            });
    }
});

