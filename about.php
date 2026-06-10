<?php
session_start();
?>
<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwaayat</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

<!-- About Section -->
<section class="about-page">

    <h1>About Riwaayat</h1>

    <p class="about-intro">
        Riwaayat is more than just fashion — it is a celebration of tradition,
        culture, and timeless elegance. We bring together modern style with
        the richness of Indian heritage.
    </p>

    <!-- Story -->
    <div class="about-box">
        <h2>Our Story</h2>
        <p>
            Founded with a passion for ethnic wear, Riwaayat was created to offer
            beautifully crafted outfits that reflect grace and authenticity.
            Every piece is designed to make you feel confident and elegant.
        </p>
    </div>

    <!-- What we offer -->
    <div class="about-box">
        <h2>What We Offer</h2>
        <p>
            From traditional kurtas and designer lehengas to stylish accessories,
            we provide a wide range of fashion that suits every occasion.
        </p>
    </div>

    <!-- Why choose us -->
    <div class="about-box">
        <h2>Why Choose Us</h2>
        <ul>
            <li>✔ Premium Quality Fabrics</li>
            <li>✔ Elegant & Modern Designs</li>
            <li>✔ Affordable Pricing</li>
            <li>✔ Customer Satisfaction</li>
        </ul>
    </div>

</section>
<script src="script.js"></script>

</body>
</html>