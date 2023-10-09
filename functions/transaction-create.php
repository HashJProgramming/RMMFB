<?php
include_once 'connection.php';
session_start();
try {
    $customer_id = $_POST['id'];
    $user_id = $_SESSION['id'];

    $sql = "SELECT * FROM transactions WHERE user_id = :user_id AND status = 'Pending'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $transaction = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($transaction) {
        header('Location: ../transaction.php?type=error&message=You have a pending transaction');
        exit();
    }

    $sql = "SELECT * FROM customers WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $customer_id);
    $stmt->execute();
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "INSERT INTO transactions (customer_id, user_id, status) VALUES (:customer_id, :user_id, 'Pending')";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    generate_logs('Adding Transaction', $customer['fullname'].' | New transaction was added');
    header('Location: ../transaction.php?type=success&message=New transaction was added successfully');
} catch (\Throwable $th) {
    generate_logs('Adding Transaction', $th);
}
?>