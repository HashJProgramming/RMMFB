<?php
include_once 'connection.php';
$id = $_POST['id'];

$sql = "UPDATE transactions SET status = 'In Progress' WHERE id = :id";
$statement = $db->prepare($sql);
$statement->bindParam(':id', $id);
$statement->execute();

header("Location: ../reciept.php?id=$id");