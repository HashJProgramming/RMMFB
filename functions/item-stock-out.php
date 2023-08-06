<?php
include_once 'connection.php';

$id = $_POST['data_id'];
$qty = $_POST['qty'];

if ($qty < 0) {
    header('Location: ../supply.php?type=error&message=Invalid quantity!');
    exit();
}

$sql = "SELECT * FROM inventory WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($qty > $row['qty']) {
    header('Location: ../inventory.php?type=error&message=Insufficient item quantity to be deducted!');
    exit();
}

$stock = $row['qty'] - $qty;

$sql = "UPDATE inventory SET qty = :stock WHERE id = :id";
$statement = $db->prepare($sql);
$statement->bindParam(':stock', $stock);
$statement->bindParam(':id', $id);
$statement->execute();
generate_logs('Stock out', $qty.' Stock was deducted');

header('Location: ../inventory.php?type=success&message=Item Stock was updated successfully!');
exit();

?>