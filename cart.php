<?php
session_start();
require_once 'db.php';

$total = 0;
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

<div class="main-content">

<h2 style="text-align:center;">Your Cart</h2>

<div style="max-width:800px; margin:auto;">

<?php
    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){

        foreach($_SESSION['cart'] as $key => $item){

            $id = $item['id'];
            $size = $item['size'];
            $qty = $item['qty'];

            $res = $conn->query("SELECT * FROM products WHERE id=$id");
            $row = $res->fetch_assoc();

            $subtotal = $row['price'] * $qty;
            $total += $subtotal;
?>

    <div style="display:flex; gap:20px; border-bottom:1px solid #ccc; padding:15px;">

        <img src="imagesmp/<?php echo $row['image']; ?>" width="250" height="300">

        <div style="flex:1;">
            <h3><?php echo $row['name']; ?></h3>

            <?php if($size != "NA") { ?>
                <p>Size: <?php echo $size; ?></p>
            <?php } ?>

            <p>₹<?php echo $row['price']; ?> × <?php echo $qty; ?></p>
            <p><b>Subtotal: ₹<?php echo $subtotal; ?></b></p>

            <a href="remove_from_cart.php?key=<?php echo $key; ?>" style="color:red; text-decoration: none;">Remove</a>
        </div>

    </div>

    <?php } ?>

    <h2 style="text-align:right;">Total: ₹<?php echo $total; ?></h2>

    <div style="text-align:right; margin:30px 0;">
        <a href="place_order.php" 
        style="padding:12px 25px; background:green; color:white; border-radius:5px; text-decoration: none;">
            Place Order
        </a>
    </div>

    <?php
    } else {
        echo "<h3 style='text-align:center;'>Cart is empty</h3>";
    }
    ?>
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