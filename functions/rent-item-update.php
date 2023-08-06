<?php
include_once 'connection.php';
session_start();
$id = $_POST['data_id'];
$returned = $_POST['date'];
$returned_timestamp = strtotime($returned);
$current_timestamp = time();

if ($returned_timestamp < $current_timestamp) {
    header('Location: ../transaction.php?type=error&message=Return date must be greater than the current date.');
    exit;
}

try {
    $sql = "UPDATE rentals SET returned = :returned WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':returned', $returned);
    $statement->bindParam(':id', $id);
    $statement->execute();
    header('Location: ../transaction.php?type=success&message=Item Returned date updated successfully!');
    generate_logs('Item Update Returned Date', 'Item Returned date updated successfully!');
    exit;
} catch (\Throwable $th) {
    header('Location: ../transaction.php?type=error&message=Something went wrong!');
    generate_logs('Update Returned Date Item - ', $th);
    exit;
}