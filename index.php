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
<!--Hero Section-->
<section class="hero">
  <div class="overlay">
    <h1>Elegance Woven With Tradition</h1>
    <p>Discover timeless ethnic fashion crafted for every celebration.</p>
    <a href="#products" class="hero-btn">Shop Now</a>
  </div>
</section>

<!-- Products Section -->
<section id="products" class="products">
    <h2>Explore Us</h2>
    <div class="product-container">
        <div class="product">
            <div class="img-box">
                <img src="imagesmp/k1.jpg" alt="Kurta">
            </div>
            <h3>V-Neck Kurta</h3>
            <p>₹450</p>
            <a href="kurta.php"><button>View More</button></a>
        </div>
        <div class="product">
            <div class="img-box">
                <img src="imagesmp/l1.jpg" alt="Lehenga">
            </div>
            <h3>Pink Silk Lehenga Choli</h3>
            <p>₹8000</p>
            <a href="lehenga.php"><button>View More</button></a>
        </div>
        <div class="product">
            <div class="img-box">
                <img src="imagesmp/necklace1.jpg" alt="Necklace">
            </div>
            <h3>Floral Emerald Green Diamond Necklace</h3>
            <p>₹1000</p>
            <a href="accessories.php"><button>View More</button></a>
        </div>
        <div class="product">
            <div class="img-box">
                <img src="imagesmp/watch1.jpg" alt="watch">
            </div>
            <h3>Rose Gold-Tone Analog Watch Set</h3>
            <p>₹700</p>
            <a href="accessories.php"><button>View More</button></a>
        </div>
        <div class="product">
            <div class="img-box">
                <img src="imagesmp/ring2.jpg" alt="Ring">
            </div>
            <h3>Gloden Bloom Floral Ring</h3>
            <p>₹690</p>
            <a href="accessories.php"><button>View More</button></a>
        </div>
        <div class="product">
            <div class="img-box">
                <img src="imagesmp/l9.jpg" alt="Lehenga">
            </div>
            <h3>Ghagra Choli</h3>
            <p>₹8000</p>
            <a href="lehenga.php"><button>View More</button></a>
        </div>
    </div>
</section>

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
