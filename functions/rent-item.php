<?php
include_once 'connection.php';
session_start();

$returned_timestamp = strtotime($_POST['return_date']);
$current_timestamp = time();

if ($returned_timestamp < $current_timestamp) {
    header('Location: ../transaction.php?type=Error&message=Return date must be greater than or equal to current date');
    exit;
}