<?php
session_start();

require_once 'db.php';

$sql = "SELECT * FROM products where product_type_id = 2";
$result = $conn->query($sql);
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
    <p class="logo"><img src="imagesmp/imglogo.png" height="70" width="70"></p>
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
<!-- PAGE HEADING -->
<section class="products">
    <h2>Kurta Collection</h2>

    <!-- 3x3 GRID -->
    <div class="grid-container">

        <?php while($row = $result->fetch_assoc()) { ?>

            <div class="grid-item">
                <div class="img-box">
                    <img src="imagesmp/<?php echo $row['image']; ?>">
                </div>
                <h3><?php echo $row['name']; ?></h3>
                <a href="product_details.php?id=<?php echo $row['id']; ?>">
                <button>View Details</button></a>
            </div>

        <?php } ?>

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
            <a href="accessories.php">Products</a>
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

