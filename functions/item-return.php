<?php
include_once 'connection.php';

$id = $_POST['data_id'];
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

if ($count > 0){
    $sql = "UPDATE transactions SET status = 'Returned' WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $item['transact_id']);
    $statement->execute();
}

    $sql = "SELECT * FROM inventory WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $item['item_id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    

if ($_POST['conditions'] > 1) {
    $stock = $row['qty'] - $item['qty'];
    $sql = "UPDATE inventory SET qty = :stock WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':stock', $stock);
    $statement->bindParam(':id', $item['item_id']);
    $statement->execute();
    generate_logs('Item Damage', $row['name'].' Stock was deducted');
    echo 'CONDITIONS: '.$_POST['conditions'].'<br>';
    echo 'ROQ QTY: '.$row['qty'].'<br>';
    echo 'ITEM QTY: '.$item['qty'].'<br>';
    echo 'STOCK QTY: '.$stock.'<br>';
    echo $item['item_id'].' '.'DEDUCTED';
} else {
    $stock = $row['qty'] + $item['qty'];
    $sql = "UPDATE inventory SET qty = :stock WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':stock', $stock);
    $statement->bindParam(':id', $item['item_id']);
    $statement->execute();
    generate_logs('Item Returned', $row['name'].' Stock was added');
    echo 'CONDITIONS: '.$_POST['conditions'].'<br>';
    echo 'ROQ QTY: '.$row['qty'].'<br>';
    echo 'ITEM QTY: '.$item['qty'].'<br>';
    echo 'STOCK QTY: '.$stock.'<br>';
    echo $item['item_id'].' '.'ADDED';
}

header('Location: ../rents.php?type=success&message=Item Returned!');
exit();

?>