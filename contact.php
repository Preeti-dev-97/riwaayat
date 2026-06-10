<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact - Riwaayat</title>
<link rel="stylesheet" href="styles.css">
</head>

<body>

<!-- Navbar -->
<nav class="navbar">
    <p class="logo"><img src="imagesmp\imglogo.png" height="70" width="70"></p>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>

        <li class="dropdown">
            <a href="#">Products ▾</a>

            <ul class="dropdown-menu">
                <li><a href="kurta.php">Kurta</a></li>
                <li><a href="lehenga.php">Lehenga</a></li>
            </ul>
        </li>

        <li><a href="accessories.php">Accessories</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>

  <a href="cart.php" class="cart-btn">
        🛒(<span id="cart-count">0</span>)
    </a>

</nav>
<!-- Contact Section -->
<section class="contact-page">

    <h1>Contact Us</h1>
    <p class="contact-subtext">
        We'd love to hear from you! Feel free to reach out anytime.
    </p>

    <div class="contact-container">

        <!-- Contact Info -->
        <div class="contact-info">
            <h3>Get in Touch</h3>
            <p>📧 riwaayat@email.com</p>
            <p>📞 +91 9876543210</p>
            <p>📍 Moga, Punjab</p>
        </div>

        <!-- Contact Form -->
        <form class="contact-form" action="contact_us.php" method="POST">
            <input type="text" name="first_name" placeholder="Your First Name" required>
            <input type="text" name="last_name" placeholder="Your Last Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="number" name="phone" placeholder="Your Phone number" required>
            <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
            <button type="submit">Send Message</button>
        </form>

    </div>

</section>

<script>
    const params = new URLSearchParams(window.location.search);

    if (params.get("success")) {
        alert("Message sent successfully!");
        document.querySelector(".contact-form").reset();
    }

    if (params.get("error")) {
        alert("Something went wrong. Try again!");
    }
</script>

<script src="script.js"></script>

</body>
</html>