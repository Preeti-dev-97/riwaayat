<?php
session_start();

$id = $_POST['id'];
$size = $_POST['size'];

$key = $id . "_" . $size;

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if(isset($_SESSION['cart'][$key])) {
    $_SESSION['cart'][$key]['qty']++;
} else {
    $_SESSION['cart'][$key] = [
        'id' => $id,
        'size' => $size,
        'qty' => 1
    ];
}

echo "added"; // important for AJAX
?>