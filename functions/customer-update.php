<?php
include_once 'connection.php';

try {
    $id = $_POST['data_id'];
    $fullname = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $birthdate = $_POST['date'];

    $sql = "UPDATE customers SET fullname = :fullname, address = :address, phone = :phone, email = :email, birthdate = :birthdate WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':fullname', $fullname);
    $statement->bindParam(':address', $address);
    $statement->bindParam(':phone', $phone);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':birthdate', $birthdate);
    $statement->execute();

    generate_logs('Customer Update', $fullname.'| Info was updated');
    header('Location: ../customers.php?type=success&message=Customer Info was updated successfully!');
    exit();

} catch (\Throwable $th) {
    generate_logs('Customer Update', $fullname.'| Error: '.$th->getMessage());
}

?>