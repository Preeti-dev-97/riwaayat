<?php
session_start();

require 'vendor/autoload.php';
require_once 'config.php';
require_once 'db.php';

\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

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
$conn->query("INSERT INTO orders (total_amount, payment_status) VALUES ($total, 'pending')");
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

/* Stripe Checkout */

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'inr',
            'product_data' => [
                'name' => 'Order #' . $order_id,
            ],
            'unit_amount' => $total * 100,
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' =>
        'http://localhost:8080/riwaayat/order_success.php?order_id=' . $order_id,
    'cancel_url' =>
        'http://localhost:8080/riwaayat/order_cancel.php?order_id=' . $order_id,
]);

$conn->query("
UPDATE orders
SET stripe_session_id='".$session->id."'
WHERE id=".$order_id."
");

header("Location: ".$session->url);
exit;
?>