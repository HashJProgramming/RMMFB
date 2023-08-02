<?php
include_once 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = :username";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../staff.php?type=error&message='.$username.' is already exist');
    exit;
}

$sql = "INSERT INTO users (username, password, type) VALUES (:username, :password, 'staff')";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
$stmt->execute();

generate_logs('Adding Staff', $fullname.'| New Staff was added');
header('Location: ../staff.php?type=success&message=New Staff was added successfully');
?>