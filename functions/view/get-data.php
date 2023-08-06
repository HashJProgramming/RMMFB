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

function get_total_rental_item($id) {
    global $db;
    $sql = "SELECT SUM(r.price) AS total, c.fullname 
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN customers c ON t.customer_id = c.id
    WHERE t.id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'];
}

function get_count_rental_items($id){
    global $db;
    $sql = "SELECT COUNT(r.id) AS total, c.fullname 
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN customers c ON t.customer_id = c.id
    WHERE t.id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'];
}

function get_total_rent(){
    global $db;
    $sql = "SELECT COUNT(id) AS total 
    FROM transactions 
    WHERE status = 'In Progress'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'];
}

function get_total_late(){
    global $db;
    $sql = "SELECT COUNT(r.id) AS total, t.status 
    FROM rentals r
    JOIN transactions t ON r.transact_id = t.id
    WHERE t.status = 'In Progress' AND r.returned < NOW()";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch();
    return $result['total'];
}

