<?php
include_once 'connection.php';
session_start();
generate_logs('Logout', $_SESSION['username'].' has logged out');
session_destroy();

header('Location: ../login.php');