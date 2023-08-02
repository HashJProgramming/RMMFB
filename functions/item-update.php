<?php
include_once 'connection.php';

$id = $_POST['data_id'];
$name = $_POST['name'];
$description = $_POST['description'];

$sql = "SELECT * FROM inventory WHERE name = :name AND id != :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../inventory.php?type=error&message='.$name.' is already exist');
    exit;
}

$sql = "UPDATE inventory SET
        name = :name,
        description = :description
        WHERE id = :id";
        
$statement = $db->prepare($sql);
$statement->bindParam(':name', $name);
$statement->bindParam(':description', $description);
$statement->bindParam(':id', $id);
$statement->execute();

generate_logs('Updating Item', $name.'| Item was updated');
header('Location: ../inventory.php?type=success&message=Item was updated successfully!');
exit();

?>