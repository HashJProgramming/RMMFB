<?php
include_once 'functions/connection.php';
function get_customer_data() {
    global $db;
    $sql = 'SELECT t.id, c.fullname, c.phone, c.email, c.address
    FROM customers c
    JOIN transactions t ON c.id = t.customer_id
    WHERE t.user_id = :user_id AND t.status = "pending"
    ORDER BY t.id DESC LIMIT 1';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_id', $_SESSION['id']);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$results){
        header('Location: ./index.php?type=error&message=you have no pending transaction!');
        exit;
    }
    return $results;
}

