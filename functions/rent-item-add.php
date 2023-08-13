<?php
include_once 'connection.php';
session_start();
$transact_id = $_POST['id'];
$id = $_POST['item'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$returned =$_POST['date'];
$returned_timestamp = strtotime($returned);
$current_timestamp = time();

if ($returned_timestamp < $current_timestamp) {
    header('Location: ../transaction.php?type=error&message=Return date must be greater than the current date.');
    exit;
}

$sql = "SELECT * FROM inventory WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($qty > $row['qty']) {
    header('Location: ../inventory.php?type=error&message=Insufficient item quantity!');
    exit();
}

$sql = "SELECT * FROM inventory WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$inventory_row = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM rentals WHERE transact_id = :transact_id AND item_id = :item_id AND returned = :returned";
$stmt = $db->prepare($sql);
$stmt->bindParam(':transact_id', $transact_id);
$stmt->bindParam(':item_id', $id);
$stmt->bindParam(':returned', $returned);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    $stock = $inventory_row['qty'] - $qty;
    $sql = "UPDATE inventory SET qty = :stock WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':stock', $stock);
    $statement->bindParam(':id', $id);
    $statement->execute();
    
    $sql = "INSERT INTO rentals (item_id, transact_id, returned, qty, price) VALUES (:item_id, :transact_id, :returned, :qty, :price)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':item_id', $id);
    $stmt->bindParam(':transact_id', $transact_id);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':returned', $returned);
    $stmt->bindParam(':qty', $qty);
    $stmt->execute();
    
} else{
    $inventory_item_qty = $inventory_row['qty'] - $qty;
    $sql = "UPDATE inventory SET qty = :stock WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':stock', $inventory_item_qty);
    $statement->bindParam(':id', $id);
    $statement->execute();

    $item_qty = $row['qty'] + $qty;
    $item_total_price = $row['price'] + $price;
    $sql = "UPDATE rentals SET qty = :qty, price = :price WHERE item_id = :id AND transact_id = :transact_id AND returned = :returned";
    $statement = $db->prepare($sql);
    $statement->bindParam(':qty', $item_qty);
    $statement->bindParam(':price', $item_total_price);
    $statement->bindParam(':transact_id', $transact_id);
    $statement->bindParam(':returned', $returned);
    $statement->bindParam(':id', $id);
    $statement->execute();
}


generate_logs('Rentals - Adding Item', $item_id.'| New Item was added');
header('Location: ../transaction.php?type=success&message=Item was added successfully');
