<?php

$host = '217.21.80.10';
$dbname = 'u196817721_mahaKumbDB';
$username = 'u196817721_mahaKumbhUser';
$password = 'MahaKumbh2027#';
$port = 3306; 


error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    $errorInfo = [
        'message' => $e->getMessage(),
        'code' => $e->getCode(),
        'file' => $e->getFile(),
        'line' => $e->getLine()
    ];
    
    error_log("Database connection error: " . print_r($errorInfo, true));

    die("Could not connect to the database. Please check the credentials and server status.<br><br>
        Host: $host<br>
        Port: $port<br>
        Username: $username<br>
        Database: $dbname<br><br>
        Error details: " . $e->getMessage());
}
?>
