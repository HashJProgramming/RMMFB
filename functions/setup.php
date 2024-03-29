<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
    $database = 'rmmfb';
    $db = new PDO('mysql:host=localhost', 'hash', 'hashjprogramming');
    $query = "CREATE DATABASE IF NOT EXISTS $database";

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec($query);
        $db->exec("USE $database");

        $db->exec("
            CREATE TABLE IF NOT EXISTS users (
              id INT PRIMARY KEY AUTO_INCREMENT,
              username VARCHAR(255),
              password VARCHAR(255),
              type VARCHAR(255),
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");

        $db->exec("
            CREATE TABLE IF NOT EXISTS customers (
              id INT PRIMARY KEY AUTO_INCREMENT,
              fullname VARCHAR(255),
              address VARCHAR(255),
              phone VARCHAR(255),
              email VARCHAR(255),
              birthdate DATE,
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");
        
        $db->exec("
            CREATE TABLE IF NOT EXISTS inventory (
              id INT PRIMARY KEY AUTO_INCREMENT,
              name VARCHAR(255),
              description VARCHAR(255),
              price DECIMAL(10,2),
              qty INT,
              created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ");

        $db->exec("
            CREATE TABLE IF NOT EXISTS transactions (
              id INT PRIMARY KEY AUTO_INCREMENT,
              customer_id int,
              user_id int,
              status VARCHAR(255),
              created_at DATE DEFAULT CURRENT_TIMESTAMP,
              FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE,
              FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            )
        ");

        $db->exec("
        CREATE TABLE IF NOT EXISTS rentals (
          id INT PRIMARY KEY AUTO_INCREMENT,
          item_id INT,
          transact_id INT,
          qty INT,
          price DECIMAL(10,2),
          returned DATE,
          penalty DECIMAL(10,2),
          conditions VARCHAR(255),
          created_at DATE DEFAULT CURRENT_TIMESTAMP,
          FOREIGN KEY (item_id) REFERENCES inventory(id) ON DELETE CASCADE,
          FOREIGN KEY (transact_id) REFERENCES transactions(id) ON DELETE CASCADE
        )
    ");

        $db->exec("
          CREATE TABLE IF NOT EXISTS logs (
            id INT PRIMARY KEY AUTO_INCREMENT,
            logs TEXT,
            type TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
        ");

        $db->beginTransaction();

        $stmt = $db->prepare("SELECT COUNT(*) FROM `users` WHERE `username` = 'admin'");
        $stmt->execute();
        $userExists = $stmt->fetchColumn();
        
        if (!$userExists) {
            $stmt = $db->prepare("INSERT INTO `users` (`username`, `password`, `type`) VALUES (:username, :password, 'admin')");
            $stmt->bindValue(':username', 'admin');
            $stmt->bindValue(':password', '$2y$10$WgL2d2fzi6IiGiTfXvdBluTLlMroU8zBtIcRut7SzOB6j9i/LbA4K');
            $stmt->execute();
        }
        
        $db->commit();

    } catch(PDOException $e) {
        die("Error creating database: " . $e->getMessage());
    }
    $db = null;
?>