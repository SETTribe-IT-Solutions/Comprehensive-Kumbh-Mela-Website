<?php
require_once 'include/connect.php';

// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Validate input
if (empty($data['name']) || empty($data['mobile'])) {
    echo json_encode(['success' => false, 'message' => 'Name and Mobile are required.']);
    exit;
}

$name = trim($data['name']);
$mobile = trim($data['mobile']);
$symptoms = trim($data['symptoms'] ?? '');

try {
    $stmt = $pdo->prepare("INSERT INTO doctor_consultations (name, mobile, symptoms) VALUES (?, ?, ?)");
    $stmt->execute([$name, $mobile, $symptoms]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
