<?php
include("config.php");

$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$image = $_POST['image'];


$sql = "INSERT INTO client-products (name, price, quantity, image) VALUES (?, ?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("sdiss", $name, $price, $quantity, $image);


if ($stmt->execute()) {
    echo "New product added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$stmt->close();
$db->close();



?>