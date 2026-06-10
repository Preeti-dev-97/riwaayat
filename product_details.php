<?php
session_start();
$conn = new mysqli("localhost", "root", "1234", "riwaayat");

$id = $_GET['id'];

/* Get product */
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

/* Get sizes */
$sizes = $conn->query("SELECT size FROM product_sizes WHERE product_id=$id");
?>

<!DOCTYPE html>
<html>
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

<div class="pd-page">

    <div class="pd-container">

        <!-- Image -->
        <div class="pd-img">
            <img src="imagesmp/<?php echo $product['image']; ?>">
        </div>

        <!-- Info -->
        <div class="pd-info">

            <h2><?php echo $product['name']; ?></h2>

            <!-- ⭐ Rating -->
            <div class="stars">

                <?php
                    $rating = $product['rating'];

                    for($i = 1; $i <= 5; $i++) {

                        if($i <= $rating) {
                                echo '<i class="fas fa-star"></i>';
                            } else {
                                echo '<i class="far fa-star"></i>';
                            }
                    }
                ?>

            </div>

            <p class="price">₹<?php echo $product['price']; ?></p>

            <?php if($product['fabric'] != null) { ?>
                <b>Fabric: <?php echo $product['fabric']; ?></b>
            <?php } ?>

            <p><?php echo $product['description']; ?></p>

            <form id="cartForm">

                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

                <?php if($sizes->num_rows > 0) { ?>
                    <?php while($row = $sizes->fetch_assoc()) { ?>
                        <label>
                            <input type="radio" name="size" value="<?php echo $row['size']; ?>" required>
                            <?php echo $row['size']; ?>
                        </label>
                        
                    <?php } ?>
                <?php } else { ?>
                    <input type="hidden" name="size" value="NA">
                <?php } ?>

                <br><br>
                <button type="submit">Add to Cart</button>

            </form>

        <p id="popup" style="display:none; color:green;">✔ Added to Cart!</p>

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

</body>
<script src="script.js"></script>
<script>
document.getElementById("cartForm").addEventListener("submit", function(e){
    e.preventDefault();

    const formData = new FormData(this);

    fetch("add_to_cart.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        document.getElementById("popup").style.display = "block";

        setTimeout(() => {
            document.getElementById("popup").style.display = "none";
        }, 2000);

        updateCartCount();
    });
});


</script>
</html>