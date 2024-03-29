<?php
include_once 'connection.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$fullname = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$birthdate = $_POST['date'];

if (date('Y') < date('Y', strtotime($birthdate))) {
    header('Location: ../customers.php?type=error&message=Invalid birthdate!');
    exit;
}

$sql = "SELECT * FROM customers WHERE email = :email OR phone = :phone";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $_SESSION['c_fullname'] = $fullname;
    $_SESSION['c_address'] = $address;
    $_SESSION['c_phone'] = $phone;
    $_SESSION['c_email'] = $email;
    $_SESSION['c_birthdate'] = $birthdate;
    header('Location: ../customers.php?type=error&message=Email address or phone number is already exist');
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

$_SESSION['c_fullname'] = '';
$_SESSION['c_address'] = '';
$_SESSION['c_phone'] = '';
$_SESSION['c_email'] = '';
$_SESSION['c_birthdate'] = '';

generate_logs('Adding Customer', $fullname.'| New Customer was added');
header('Location: ../customers.php?type=success&message=New customer was added successfully');
?>