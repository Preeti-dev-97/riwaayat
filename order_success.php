<?php

session_start();

require 'vendor/autoload.php';
require_once 'db.php';

$conn = new mysqli("localhost","root","1234","riwaayat");

$order_id = (int)$_GET['order_id'];

$conn->query("
UPDATE orders
SET payment_status='paid'
WHERE id=$order_id
");

unset($_SESSION['cart']);

?>

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
        <li><a href="#home">Home</a></li>

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

<div class="order-page">

    <div class="order-box">

        <h1>✅ Order Placed Successfully!</h1>

        <p>Your order has been placed.</p>

        <div class="order-buttons">
            <a href="index.php" class="btn">Continue Shopping</a>
            <a href="cart.php" class="btn secondary">View Cart</a>
        </div>

    </div>

</div>

<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-box">
            <h2 class="footer-logo">Riwaayat</h2>
            <p>Celebrating timeless tradition with modern elegance.</p>
        </div>

        <div class="footer-box">
            <h3>Quick Links</h3>
            <a href="index.php">Home</a>
            <a href="lehenga.php">Products</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </div>

        <div class="footer-box">
            <h3>Contact</h3>
            <p>📧 riwaayat@email.com</p>
            <p>📞 +91 9876543210</p>
            <p>📍 Moga, Punjab</p>
        </div>

       <div class="footer-box">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2026 Riwaayat ❤️ | All Rights Reserved</p>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>