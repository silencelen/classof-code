<!--b1.0-->
<?php
session_start();
if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="icon" href="images/iconbig.ico">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BHS Class of 1985 Alumni | Bothell High School Reunion & Events</title>
  <meta name="description"
    content="Official BHS Class of 1985 alumni site for Bothell High School—get event details, buy reunion tickets, and connect with classmates.">
  <meta name="keywords"
    content="Bothell high school, BHS alumni, BHS Class of 1985, high school reunion, class of 1985, alumni events, Bothell, BHS 1985 reunion">
  <link rel="canonical" href="https://bhsclassof1985.com/">

  <meta property="og:type" content="website">
  <meta property="og:title" content="BHS Class of 1985 Alumni | Reunion & Events">
  <meta property="og:description"
    content="Official alumni hub for Bothell High School Class of 1985—connect, view upcoming reunions, and purchase tickets.">
  <meta property="og:url" content="https://bhsclassof1985.com/">
  <meta property="og:image" content="https://bhsclassof1985.com/assets/og-home.png">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="BHS Class of 1985 Alumni | Reunion & Events">
  <meta name="twitter:description"
    content="Official alumni hub for Bothell High School Class of 1985—reunion details, events, and ticketing.">
  <meta name="twitter:image" content="https://bhsclassof1985.com/assets/og-home.png">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "url": "https://bhsclassof1985.com/",
    "name": "BHS Class of 1985 Alumni",
    "description": "Official alumni site for Bothell High School Class of 1985—event info, reunion plans, and ticketing."
  }
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "BHS Class of 1985 Alumni",
    "url": "https://bhsclassof1985.com/",
    "logo": "https://bhsclassof1985.com/images/iconbig.ico",
    "contactPoint": [{
      "@type": "ContactPoint",
      "email": "contact@bhsclassof1985.com",
      "contactType": "Customer Service"
    }]
  }
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Event",
    "name": "BHS Class of 1985 40 Year Reunion Weekend",
    "startDate": "2025-09-12T18:00",
    "endDate": "2025-09-14T23:00",
    "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
    "eventStatus": "https://schema.org/EventScheduled",
    "location": {
      "@type": "Place",
      "name": "Bothell High School",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "9130 NE 180th St",
        "addressLocality": "Bothell",
        "addressRegion": "WA",
        "postalCode": "98011",
        "addressCountry": "US"
      }
    },
    "image": "https://bhsclassof1985.com/assets/og-home.png",
    "description": "Celebrate 40 years with the Bothell High School Class of 1985! Join us for a weekend of fun, memories, and reconnections.",
    "organizer": {
      "@type": "Organization",
      "name": "BHS Class of 1985 Alumni",
      "url": "https://bhsclassof1985.com/"
    }
  }
  </script>
</head>
<script src="/js/main.js"></script>
<body>
  <header>
    <div class="logo">
      <img src="images/iconbig.ico" alt="BHS logo" />
      Bothell High Class of ’85
    </div>
    <button id="menu-toggle" aria-label="Open navigation menu">&#9776;</button>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="#events">Upcoming Events</a></li>
        <li><a href="#Keep-in-Touch">Register</a></li>
        <li><a href="/40years">40 Years</a></li>
      </ul>
    </nav>
  </header>

  <section id="Welcome" class="visible">
    <h1>Welcome Bothell High School Class of 1985 Alumni</h1>
    <p>
      Your official alumni hub. Stay up to date on Bothell High School <strong>reunions</strong>, events, and connect
      with <strong>BHS Class of 1985</strong> classmates.
      <br><br>
      <a href="#Keep-in-Touch" class="btn">Join Our Alumni List</a>
    </p>
  </section>

  <section id="events">
    <h2>Upcoming Events & Reunions</h2>
    <div class="card-container">
      <div class="event-card">
        <h3>40 Year Reunion Weekend</h3>
        <p><strong>Date:</strong> September 12th–14th, 2025</p>
        <p><strong>Location:</strong> Fri, Sun TBD. Sat at Nardoland </p>
        <p>
          <a href="/40years" class="btn">Learn More & RSVP</a>
        </p>
      </div>
    </div>
  </section>
  <section id="Keep-in-Touch">
    <h2>Stay Connected with Bothell High School Class of 1985</h2>
    <h3>Sign up to receive Alumni updates and event invitations</h3>
    <form id="stay-form" action="submit.php" method="post" autocomplete="off">

      <input type="text" name="hp" id="hp_field" value=""
        style="position:absolute; left:-9999px; top:-9999px; opacity:0; height:0; width:0; visibility:hidden;"
        tabindex="-1" autocomplete="off">
      <input type="text" name="hp" style="display:none;" autocomplete="off">
      <input type="hidden" name="ts" value="<?= time() ?>">
      <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">

      <label>Name*:<br>
        <input type="text" name="name" id="stay-name" placeholder="Your first and last name (maiden name)" required
          maxlength="50">
      </label>
      <label>Email:<br>
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

  <section id="archives">
    <h2>Past Reunions & Alumni Events</h2>
    <div class="card-container">
      <div class="archive-card visible">
        <h3>30 Year Reunion</h3>
        <p>June 27, 2015 • Triplehorn Brewing Co</p>
      </div>
    </div>
  </section>

  <footer id="contact" style="padding:2rem 1rem; text-align:center; background: var(--accent-color); color:#fff;">
    <h2>Contact Us</h2>
    <p>
      Questions or want to help plan?
      Email <a href="mailto:contact@bhsclassof1985.com" target="_blank" rel="noopener noreferrer"
        style="color:#fff; text-decoration:underline;">contact@bhsclassof1985.com</a>
    </p>
    <p style="margin-top:1.5rem;font-size:0.95em;opacity:0.7;">
      &copy; 2025 BHS Class of 1985 Alumni | Bothell, WA. Not affiliated with Bothell High School or Northshore School
      District.
    </p>
    <p>
      <a href="/" style="color:#fff; text-decoration:underline;">Back to top</a>
    </p>
  </footer>

</body>

</html>