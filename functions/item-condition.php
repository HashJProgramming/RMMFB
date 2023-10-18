<?php
include_once 'connection.php';
$id = $_POST['data_id'];
$conditions = $_POST['conditions'];

$sql = "UPDATE rentals SET
        conditions = :conditions
        WHERE id = :id";
$statement = $db->prepare($sql);
$statement->bindParam(':conditions', $conditions);
$statement->bindParam(':id', $id);
$statement->execute();

if ($conditions < 6){
    $sql = "SELECT * FROM rentals WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $rental_row = $stmt->fetch(PDO::FETCH_ASSOC);
    $rental_qty = $rental_row['qty'];

    $sql = "SELECT * FROM inventory WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $rental_row['item_id']);
    $stmt->execute();
    $inventory_row = $stmt->fetch(PDO::FETCH_ASSOC);
    $inventory_qty = $inventory_row['qty'];

    $stock = $inventory_qty + $rental_qty;

    $sql = "UPDATE inventory SET qty = :stock WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':stock', $stock);
    $statement->bindParam(':id', $rental_row['item_id']);
    $statement->execute();
    generate_logs('Repaired Rental Item', $qty.' Stock was returned');
    header('Location: ../damage.php?type=success&message=Item was repaired successfully');
    exit();
}
generate_logs('Beyond Repaired Rental Item', $qty.' Stock was not returned');
header('Location: ../damage.php?type=success&message=Item was beyond repaired updated successfully');
