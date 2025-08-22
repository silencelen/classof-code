<?php
session_start();
if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="images/iconbig.ico">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WHS Class of 1985 Alumni | Woodinville HS Reunion & Events</title>
  <meta name="description" content="Official WHS Class of 1985 alumni hub for Woodinville High—event info & ticketing.">
  <meta name="keywords" content="Woodinville high school, class of '85, alumni, reunion, events">
  <link rel="canonical" href="https://WHSclassof1985.com/">

  <meta property="og:type" content="website">
  <meta property="og:title" content="WHS Class of 1985 Alumni | Reunion & Events">
  <meta property="og:description" content="Connect with Woodinville High School Class of 1985—upcoming reunions & ticket info.">
  <meta property="og:url" content="https://WHSclassof1985.com/">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="WHS Class of 1985 Alumni | Events">
  <meta name="twitter:description" content="Join our 40 Year Reunion Weekend & stay in touch!">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "url": "https://WHSclassof1985.com/",
    "name": "WHS Class of 1985 Alumni",
    "description": "Your go-to site for all Class of 1985 happenings, reunions, & events."
  }
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "WHS Class of 1985 Alumni",
    "url": "https://WHSclassof1985.com/",
    "logo": "https://WHSclassof1985.com/images/iconbig.ico",
    "contactPoint": [
    {
      "@type": "ContactPoint",
      "email": "contact@WHSclassof1985.com",
      "contactType": "Customer Service"
    }
  ]
}
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Event",
    "name": "WHS Class of 1985 40 Year Reunion Weekend",
    "startDate": "2025-09-12T18:00",
    "endDate": "2025-09-14T23:00",
    "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
    "eventStatus": "https://schema.org/EventScheduled",
    "location": {
      "@type": "Place",
      "name": "Woodinville High School",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "9130 NE 180th St",
        "addressLocality": "Woodinville",
        "addressRegion": "WA",
        "postalCode": "98011",
        "addressCountry": "US"
      }
    },
    "image": "https://WHSclassof1985.com/assets/og-home.png",
    "description": "Celebrate 40 years with the Woodinville HS Class of 1985! Weekend full of memories.",
    "organizer": {
      "@type": "Organization",
      "name": "WHS Class of 1985 Alumni",
      "url": "https://WHSclassof1985.com/"
    }
  }
  </script>
</head>

<body>
  <header>
    <div class="logo">
      <a href="https://whsclassof1985.com" rel="noopener">
        <img src="images/fullsize.png" alt="WHS logo" /></a>
      Woodinville High Class of ’85
    </div>
    <button id="menu-toggle" aria-label="Toggle menu"></button>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="#events">Upcoming Events</a></li>
        <li><a href="#sign-up">Register</a></li>
        <li><a href="/reunion">Reunion</a></li>
      </ul>
    </nav>
  </header>

  <section id="Welcome" class="visible">
    <h1>Welcome Woodinville High School Class of 1985 Alumni</h1>
    <p>
      Your official alumni hub. Stay up to date on Woodinville High School <strong>reunions</strong>, events, and connect
      with <strong>WHS Class of 1985</strong> classmates.
      <br><br>
      <a href="#sign-up" class="btn">Join Our Alumni List</a>---<a href="/reunion" class="btn">Buy Reunion Ticket</a>
    </p>
  </section>
  </br>
  <center>
    <p><a href="https://bhsclassof1985.com" target="blank" style="color:#4e4e4e; text-decoration:underline;">Here from Bothell HS? Visit your hub</a></p>
  </center>
<section id="events">
  </br></br></br></br>
    <h2>Upcoming Events & Reunions</h2>
    <div class="card-container">
      <div class="event-card">
        <h3><a href="/friday">Night at the Lime ></a></h3>
        <p><strong>Date:</strong></br>
        September 12th, 2025</p>
        <p><strong>Location:</strong></br>
        6pm @ The Lime</p>
        <!--<p><a href="/40years" class="btn">Learn More</a></p>-->
      </div>
      <div class="event-card">
        <h3><a href="/reunion">40 Year Reunion w/ Woodinville ></a></h3>
        <p><strong>Date:</strong></br>
        September 13th, 2025</p>
        <p><strong>Location:</strong></br>
        6-10pm @ Nardoland</p>
        <!--<p><a href="/40years" class="btn">Learn More & RSVP</a></p>-->
      </div>
      <div class="event-card">
        <h3><a href="/sunday">Sunday Hang ></a></h3>
        <p><strong>Date:</strong></br>
        September 14th, 2025</p>
        <p><strong>Location:</strong></br>
        2pm @ Cottage Lake</p>
        <!--<p><a href="/40years" class="btn">Learn More</a></p>-->
      </div>
    </div>
    </br><center>
    Ready for the reunion? Visit the Reunion tab to purchase your tickets and secure your spot. We can't wait to see you!
</center>
  </section>
  <section id="announcement">
    <center>
      <h2>Two High Schools. One Epic Class.</h2>
      <h3>MERGE WEEKEND from Friday, September 12th to Sunday, September 14th!</h3>
      </br>
      <p>Remember "The Great Class Split" when Woodinville High School opened Junior year we all got shuffled around?</p>
      <p>Now, 40 years later, we reunite both halves at our MERGE WEEKEND!</p>
      <p>Be there when the Class of '85 becomes whole again.</p>
    </center>
  </section>
  <section id="sign-up">
    </br></br></br></br>
    <h2>Stay Connected</h2>
    <h3>Sign up for alumni news & invites</h3>
    <form id="stay-form" action="submit.php" method="post" autocomplete="off">

      <input type="text" name="hp" id="hp_field" value=""
        style="position:absolute; left:-9999px; top:-9999px; opacity:0; height:0; width:0; visibility:hidden;"
        tabindex="-1" autocomplete="off">
      <input type="text" name="hp" style="display:none;" autocomplete="off">
      <input type="hidden" name="ts" value="<?= time() ?>">
      <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">

      <label>Name:*<br>
        <input type="text" name="name" id="stay-name" placeholder="Your first and last name (maiden name)" required
          maxlength="50">
      </label>
      <label>Email:*<br>
        <input type="email" name="email" id="stay-email" placeholder="you@example.com" maxlength="50">
      </label>
      <label>Phone:<br>
        <input type="tel" name="phone" id="stay-phone" placeholder="(555)-123-4567" maxlength="30">
      </label>
      <label>Mailing Address:<br>
        <textarea name="address" id="stay-address" placeholder="Street, City, State, ZIP" maxlength="150"></textarea>
      </label>
      <button type="submit" class="btn">Submit</button>
    </form>
    <p id="stay-message" style="display:none; margin-top:1rem; color: var(--primary-color); font-weight:bold;"></p>
  </section>
<!--
  <section id="archives">
    <h2>Past Reunions & Events</h2>
    <div class="card-container">
      <div class="archive-card visible">
        <h3>30 Year Reunion</h3>
        <p>June 27, 2015 • Triplehorn Brewing Co</p>
      </div>
    </div>
  </section>
-->
<script src="/js/main.js"></script>

  <footer id="contact" style="padding:2rem;text-align:center; background: var(--accent-color); color:#fff;">
    <h2>Contact Us</h2>
    <p>Questions or want to help plan?</p>
    <p>Email <a href="mailto:contact@WHSclassof1985.com"
        style="color:#fff; text-decoration:underline;">contact@WHSclassof1985.com</a></p>
    <p style="margin-top:1rem; font-size:0.9em; opacity:0.7;">
      &copy; <span id="year"></span> WHS Class of ’85 Alumni | Woodinville, WA.
    </p>
    <p><a href="/40years" style="color:#fff; text-decoration:underline;">Back to top</a></p>
  </footer>
  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>

</html>