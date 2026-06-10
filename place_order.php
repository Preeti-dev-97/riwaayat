<?php
session_start();
$conn = new mysqli("localhost", "root", "1234", "riwaayat");

if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
    echo "Cart is empty";
    exit();
}

$total = 0;

/* calculate total */
foreach($_SESSION['cart'] as $item){
    $res = $conn->query("SELECT * FROM products WHERE id=".$item['id']);
    $row = $res->fetch_assoc();
    $total += $row['price'] * $item['qty'];
}

/* insert order */
$conn->query("INSERT INTO orders (total_amount) VALUES ($total)");
$order_id = $conn->insert_id;

/* insert items */
foreach($_SESSION['cart'] as $item){

    $id = $item['id'];
    $size = $item['size'];
    $qty = $item['qty'];

    $res = $conn->query("SELECT * FROM products WHERE id=$id");
    $row = $res->fetch_assoc();

    $price = $row['price'];

    $conn->query("INSERT INTO order_items (order_id, product_id, size, quantity, price)
                  VALUES ($order_id, $id, '$size', $qty, $price)");
}

/* clear cart */
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

        <h3>Total Paid: ₹<?php echo $total; ?></h3>

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