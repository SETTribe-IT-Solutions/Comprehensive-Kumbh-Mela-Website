<?php
header('Content-Type: application/json');
if (ob_get_length()) ob_clean();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'include/connect.php';

$usernameOrEmail = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if (!$usernameOrEmail || !$password) {
  echo json_encode(['status' => 'error', 'message' => 'Both fields are required.']);
  exit;
}

try {
  // Check if user exists first
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
  $stmt->execute([$usernameOrEmail, $usernameOrEmail]);
  $user = $stmt->fetch();

  if (!$user) {
    echo json_encode([
      'status' => 'error',
      'message' => 'Username or Email not found. Please try again or register.'
    ]);
    exit;
  }

  // Verify password
  if (!password_verify($password, $user['password'])) {
    echo json_encode([
      'status' => 'error',
      'message' => 'Incorrect password.'
    ]);
    exit;
  }

  // Start session and return success
  session_start();
  $_SESSION['user'] = [
    'id' => $user['id'],
    'fullname' => $user['fullname'],
    'username' => $user['username']
  ];

  echo json_encode([
    'status' => 'success',
    'message' => 'Welcome back, ' . $user['fullname'] . '!'
  ]);

} catch (PDOException $e) {
  echo json_encode([
    'status' => 'error',
    'message' => 'Server error. Please try again later.'
  ]);
}
