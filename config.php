<?php
// Database configuration for XAMPP
$host = 'localhost';
$dbname = 'health_db';
$username = 'root';
$password = ''; 
$port = 3307;   

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    
    
} catch (PDOException $e) {
    // More detailed error information
    $errorInfo = [
        'message' => $e->getMessage(),
        'code' => $e->getCode(),
        'file' => $e->getFile(),
        'line' => $e->getLine()
    ];
    
    error_log("Database connection error: " . print_r($errorInfo, true));
    
    die("Could not connect to the database. Please check the following:<br><br>
        1. Make sure MySQL is running in XAMPP<br>
        2. Verify the connection details:<br>
        - Host: $host<br>
        - Port: $port<br>
        - Username: $username<br>
        - Database: $dbname<br><br>
        Error details: " . $e->getMessage());
}
?>