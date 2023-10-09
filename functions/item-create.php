<?php
include_once 'connection.php';

$name = $_POST['name'];
$description = $_POST['description'];
$qty = $_POST['qty'];

if ($qty <= 0) {
    header('Location: ../inventory.php?type=error&message=Invalid quantity!');
    exit();
}

$sql = "SELECT * FROM inventory WHERE name = :name";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../inventory.php?type=error&message=Item is already taken');
    exit;
}

$sql = "INSERT INTO inventory (name, description, qty) VALUES (:name, :description, :qty)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':qty', $qty);
$stmt->execute();

generate_logs('Adding Item', $name.'| New Item was added');
header('Location: ../inventory.php?type=success&message=Item was added successfully');
