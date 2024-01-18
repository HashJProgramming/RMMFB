<?php
include_once 'connection.php';

$id = $_POST['data_id'];
$qty = $_POST['qty'];
$sql = "SELECT * FROM rentals WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$item = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "UPDATE rentals SET penalty = :penalty, conditions = :conditions WHERE id = :id";
$statement = $db->prepare($sql);
$statement->bindParam(':penalty', $_POST['penalty']);
$statement->bindParam(':conditions', $_POST['conditions']);
$statement->bindParam(':id', $id);
$statement->execute();

$sql = "SELECT COUNT(*) FROM rentals WHERE transact_id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $item['transact_id']);
$stmt->execute();
$count = $stmt->fetchColumn();

$sql = "SELECT * FROM inventory WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $item['item_id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($count > 0){
    $sql = "UPDATE transactions SET status = 'Returned' WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $item['transact_id']);
    $statement->execute();
}


if ($_POST['conditions'] > 1) {
    $damage = $item['qty'] - $qty;
    
    $sql = "UPDATE rentals SET qty = :qty WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':qty', $qty);
    $stmt->execute();

    generate_logs('Item Returned Damage', $row['name'].' '.$qty.' Stock was deducted');
    $stock = $row['qty'] + $damage;
    $sql = "UPDATE inventory SET qty = :stock WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':stock', $stock);
    $statement->bindParam(':id', $item['item_id']);
    $statement->execute();

    generate_logs('Item Returned', $row['name'].' '.$stock.' Stock was added');
    header('Location: ../rents.php?type=success&message=Item Returned!');
    exit();
} else {
    $stock = $item['qty'] + $row['qty'] ;
    $sql = "UPDATE inventory SET qty = :stock WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':stock', $stock);
    $statement->bindParam(':id', $item['item_id']);
    $statement->execute();
    generate_logs('Item Returned', $row['name'].' Stock was added');
    header('Location: ../rents.php?type=success&message=Item Returned!');
    exit();
}
?>