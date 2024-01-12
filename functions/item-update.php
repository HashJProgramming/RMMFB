<?php
include_once 'connection.php';

$id = $_POST['data_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$sql = "SELECT * FROM inventory WHERE name = :name AND description = :description AND id != :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../inventory.php?type=error&message=Item name and description is already exist.');
    exit;
}

$sql = "UPDATE inventory SET
        name = :name,
        description = :description
        price = :price
        WHERE id = :id";
        
$statement = $db->prepare($sql);
$statement->bindParam(':name', $name);
$statement->bindParam(':description', $description);
$statement->bindParam(':price', $price);
$statement->bindParam(':id', $id);
$statement->execute();

generate_logs('Updating Item', $name.'| Item was updated');
header('Location: ../inventory.php?type=success&message=Item was updated successfully!');
exit();

?>