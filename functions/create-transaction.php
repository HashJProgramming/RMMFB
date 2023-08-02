<?php
include_once 'connection.php';

$id = $_POST['id'];
$item = $_POST['item'];
$price = $_POST['price'];
$returned = $_POST['date'];
$returned_timestamp = strtotime($returned);
$current_timestamp = time();

if ($returned_timestamp < $current_timestamp) {
    header('Location: ../rents.php?type=Error&message= Return date must be greater than current date');
} 

$sql = "INSERT INTO transactions (customer_id, item, price, returned) VALUES (:customer_id, :item, :price, :returned)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':customer_id', $id);
$stmt->bindParam(':item', $item);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':returned', $returned);
$stmt->execute();

generate_logs('Adding Transaction', $id.'| New transaction was added');
header('Location: ../rents.php?type=success&message=New transaction was added successfully');
?>