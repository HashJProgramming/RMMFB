<?php
include_once 'connection.php';
$id = $_POST['data_id'];
$conditions = $_POST['conditions'];
$qty = $_POST['qty'];

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

if ($qty <= $rental_qty) {
    if ($conditions == 6) {
        $new_rental_qty = $rental_qty - $qty;
    } else {
        $stock = $inventory_qty + $qty;
        $new_rental_qty = $rental_qty - $qty;

        if ($new_rental_qty == 0) {
            $conditions = 3;
        }

        $sql = "UPDATE inventory SET qty = :stock WHERE id = :id";
        $statement = $db->prepare($sql);
        $statement->bindParam(':stock', $stock);
        $statement->bindParam(':id', $rental_row['item_id']);
        $statement->execute();
    }

    $sql = "UPDATE rentals SET qty = :new_rental_qty, conditions = :conditions WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':new_rental_qty', $new_rental_qty);
    $statement->bindParam(':conditions', $conditions);
    $statement->bindParam(':id', $id);
    $statement->execute();

    generate_logs('Repaired Rental Item', $qty . ' Stock was returned');
    header('Location: ../damage.php?type=success&message=Item was repaired successfully');
    exit();
} else {
    generate_logs('Invalid Quantity', 'The quantity is greater than the rental quantity');
    header('Location: ../damage.php?type=error&message=Invalid quantity');
    exit();
}
