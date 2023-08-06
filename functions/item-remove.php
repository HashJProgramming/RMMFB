<?php
include_once 'connection.php';

try {
    $id = $_POST['data_id'];
    
    $sql = "SELECT * FROM inventory WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    $sql = "DELETE FROM inventory WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    generate_logs('Removing Item',  $result['name'].' was removed');
    header('Location: ../inventory.php?type=success&message='.$result['name'].' was removed successfully!');
} catch (\Throwable $th) {
    generate_logs('Removing Item', $th);
    header('Location: ../inventory.php?type=error&message=Something went wrong, please try again');
}