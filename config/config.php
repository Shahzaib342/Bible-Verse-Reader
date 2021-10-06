<?php
$serverName = "localhost";
$username = "root";
$password = "sa";
$db = "bible";
try {
    $conn = new PDO("mysql:host=$serverName;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
} catch (PDOException $e) {
    return "Connection failed: " . $e->getMessage();
}
