<?php
include_once 'connection.php';

$id = $_POST['data_id'];
$qty = $_POST['qty'];
$penalty = $_POST['penalty'];

$sql = "SELECT * FROM rentals WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$item = $stmt->fetch(PDO::FETCH_ASSOC);

// $sql = "UPDATE rentals SET penalty = penalty + :penalty, conditions = :conditions WHERE id = :id";
// $statement = $db->prepare($sql);
// $statement->bindParam(':penalty', $_POST['penalty']);
// $statement->bindParam(':conditions', $_POST['conditions']);
// $statement->bindParam(':id', $id);
// $statement->execute();

// $sql = "SELECT COUNT(*) FROM rentals WHERE transact_id = :id";
// $stmt = $db->prepare($sql);
// $stmt->bindParam(':id', $item['transact_id']);
// $stmt->execute();
// $count = $stmt->fetchColumn();

$sql = "SELECT * FROM inventory WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $item['item_id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// if ($count > 0){
//     $sql = "UPDATE transactions SET status = 'Returned' WHERE id = :id";
//     $statement = $db->prepare($sql);
//     $statement->bindParam(':id', $item['transact_id']);
//     $statement->execute();
// }


if ($_POST['conditions'] > 1) {
    $sql = "UPDATE rentals SET item_return = item_return + :qty, item_damage = item_damage + :qty, penalty =  penalty + :penalty WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':qty', $qty);
    $stmt->bindParam(':penalty', $penalty);
    $stmt->execute();

    // $stock = $row['qty'] - $qty;

    // $sql = "UPDATE inventory SET qty = :stock WHERE id = :id";
    // $statement = $db->prepare($sql);
    // $statement->bindParam(':stock', $stock);
    // $statement->bindParam(':id', $item['item_id']);
    // $statement->execute();
    
    generate_logs('Item Returned Damage', $row['name'].' '.$qty.' Stock was deducted');
    header('Location: ../rents.php?type=success&message=Item Returned!');
    exit();
} else {

    $sql = "UPDATE rentals SET item_return = item_return + :qty, penalty =  penalty + :penalty WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':qty', $qty);
    $stmt->bindParam(':penalty', $penalty);
    $stmt->execute();

    $stock = $row['qty'] + $qty;

    $sql = "UPDATE inventory SET qty = :stock WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':stock', $stock);
    $statement->bindParam(':id', $item['item_id']);
    $statement->execute();

    generate_logs('Item Returned', $row['name'].' '.$qty.' Stock was added');
    header('Location: ../rents.php?type=success&message=Item Returned!');
    exit();
}
?>