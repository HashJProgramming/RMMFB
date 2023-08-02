<?php
include_once 'connection.php';

$fullname = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$birthdate = $_POST['date'];

$sql = "SELECT * FROM customers WHERE fullname = :fullname OR phone = :phone";
$stmt = $db->prepare($sql);
$stmt->bindParam(':fullname', $fullname);
$stmt->bindParam(':phone', $phone);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../customers.php?type=error&message='.$fullname.' is already exist or phone number is already exist');
    exit;
}

$sql = "INSERT INTO customers (fullname, address, phone, email, birthdate) VALUES (:fullname, :address, :phone, :email, :birthdate)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':fullname', $fullname);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':birthdate', $birthdate);
$stmt->execute();

generate_logs('Adding Customer', $fullname.'| New Customer was added');
header('Location: ../customers.php?type=success&message=New customer was added successfully');
?>