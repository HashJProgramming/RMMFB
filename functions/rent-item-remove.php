<?php
include_once 'connection.php';

try {
    $id = $_POST['data_id'];
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
    generate_logs('Remove Rental Item', $qty.' Stock was returned');
    
    $sql = "DELETE FROM rentals WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();

    generate_logs('Rental Removing Item','Rental item was removed successfully! was removed');
    header('Location: ../transaction.php?type=success&message=item was removed successfully!');
} catch (\Throwable $th) {
    generate_logs('Rental Removing Item', $th);
    header('Location: ../transaction.php?type=error&message=Something went wrong, please try again');
}