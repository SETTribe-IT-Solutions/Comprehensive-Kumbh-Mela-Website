<?php
session_start();
require_once 'include/connect.php'; // Your DB connection

// Only count if not already counted in this session
if (!isset($_SESSION['visitor_counted'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    // Check if IP already exists in DB
    $stmt = $pdo->prepare("SELECT id FROM visitor_counter WHERE ip_address = ?");
    $stmt->execute([$ip]);

    if ($stmt->rowCount() == 0) {
        // New visitor, insert into visitor_counter
        $insert = $pdo->prepare("INSERT INTO visitor_counter (ip_address, user_agent) VALUES (?, ?)");
        $insert->execute([$ip, $userAgent]);

        // Increment the total count
        $update = $pdo->prepare("UPDATE total_visits SET count = count + 1 WHERE id = 1");
        $update->execute();

        $_SESSION['visitor_counted'] = true;
    }
}

// Fetch updated count
$countStmt = $pdo->query("SELECT count FROM total_visits WHERE id = 1");
$count = $countStmt->fetchColumn();

// Return count as JSON
echo json_encode(['count' => number_format($count)]);
?>
