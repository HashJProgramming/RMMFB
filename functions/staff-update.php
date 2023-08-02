<?php
include_once 'connection.php';

try {
    $id = $_POST['data_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET username = :username, password = :password WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
    $statement->execute();

    generate_logs('Staff Update', $username.'| Info was updated');
    header('Location: ../staff.php?type=success&message=Staff Info was updated successfully!');
    exit();

} catch (\Throwable $th) {
    generate_logs('Customer Update', $username.'| Error: '.$th->getMessage());
}
?>