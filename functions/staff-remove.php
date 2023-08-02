<?php
include_once 'connection.php';

try {
    $id = $_POST['data_id'];
    
    $sql = "SELECT * FROM users WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    $sql = "DELETE FROM users WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    generate_logs('Removing Staff',  $result['username'].' was removed');
    header('Location: ../staff.php?type=success&message='.$result['username'].' was removed successfully!');
} catch (\Throwable $th) {
    generate_logs('Removing Staff', $th);
    header('Location: ../staff.php?type=error&message=Something went wrong, please try again');
}