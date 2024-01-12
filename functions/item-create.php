<?php
include_once 'connection.php';

$name = $_POST['name'];
$description = $_POST['description'];
$qty = $_POST['qty'];
$price = $_POST['price'];

if ($qty <= 0) {
    header('Location: ../inventory.php?type=error&message=Invalid quantity!');
    exit();
}

$sql = "SELECT * FROM inventory WHERE name = :name AND description = :description";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../inventory.php?type=error&message=Item name and description is already exist.');
    exit;
}

$sql = "INSERT INTO inventory (name, description, qty, price) VALUES (:name, :description, :qty, :price)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':qty', $qty);
$stmt->bindParam(':price', $price);
$stmt->execute();

generate_logs('Adding Item', $name.'| New Item was added');
header('Location: ../inventory.php?type=success&message=Item was added successfully');
