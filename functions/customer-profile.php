<?php
include_once 'connection.php';
$id = $_GET['id'];
function get_customer_fullname(){
    global $id;
    global $db;
    $sql = "SELECT * FROM customers WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch();
    echo $result['fullname'];
}

function get_sale(){
    global $id;
    global $db;
    $sql = "SELECT SUM(r.price) AS total
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN customers c ON t.customer_id = c.id
    WHERE c.id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch();
    echo $result['total'] ?? 0;
}

function get_returned(){
    global $db;
    global $id;
    $sql = "SELECT COUNT(r.id) AS total
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN customers c ON t.customer_id = c.id
    WHERE c.id = :id AND r.conditions IS NOT NULL";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch();
    echo $result['total'] ?? 0;
}

function get_borrowed(){
    global $db;
    global $id;
    $sql = "SELECT COUNT(r.id) AS total
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN customers c ON t.customer_id = c.id
    WHERE c.id = :id AND r.conditions IS NULL";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch();
    echo $result['total'] ?? 0;
}

function get_bad_condition(){
    global $db;
    global $id;
    $sql = "SELECT COUNT(r.id) AS total
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN customers c ON t.customer_id = c.id
    WHERE c.id = :id AND r.conditions > 1";
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $result = $statement->fetch();
    echo $result['total'] ?? 0;
}