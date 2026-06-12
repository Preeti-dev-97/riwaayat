<?php
require_once 'db.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$sql = "INSERT INTO contacts (first_name, last_name, email, phone, message)
        VALUES ('$first_name', '$last_name', '$email', '$phone', '$message')";
if ($conn->query($sql) === TRUE) {
    header("Location: contact.php?success=1");
} else {
    header("Location: contact.php?error=1");
}

$conn->close();
?>