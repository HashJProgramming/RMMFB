<?php
include_once 'connection.php';

$current = $_POST['current'];
$new = $_POST['new'];

$sql = "SELECT * FROM users WHERE id = 1";
$stmt = $db->prepare($sql);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($current, $user['password'])) {
 
    $sql = "UPDATE users SET password = :new WHERE id = 1";
    $statement = $db->prepare($sql);
    $statement->bindParam(':new', password_hash($new, PASSWORD_DEFAULT));
    $statement->execute();

    generate_logs('Change Password', $user['username'].'| Password was updated');
    header('Location: ../account.php?type=success&message=Password was updated successfully!');
    exit();
} else {
    // Show an error message
    header('location: ../account.php?type=error&message=Wrong password');
    exit();
}

?>