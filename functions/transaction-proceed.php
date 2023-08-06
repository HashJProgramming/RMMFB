<?php
include_once 'connection.php';
$id = $_POST['id'];

    $sql = "SELECT COUNT(r.id) AS total, c.fullname 
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN customers c ON t.customer_id = c.id
    WHERE t.id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch();
   
if($result['total'] == 0){
    header('Location: ../transaction.php?type=error&message=Please add atleast one item!');
    exit;
}

$sql = "UPDATE transactions SET status = 'In Progress' WHERE id = :id";
$statement = $db->prepare($sql);
$statement->bindParam(':id', $id);
$statement->execute();

header("Location: ../reciept.php?id=$id");