<?php
// Always return JSON
header('Content-Type: application/json');

// Clear accidental output
if (ob_get_length()) ob_clean();

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to database
require_once 'include/connect.php';

// Check DB connection
if (!isset($pdo)) {
  echo json_encode([
    'status' => 'error',
    'message' => 'Database connection failed.'
  ]);
  exit;
}

// Fetch and sanitize POST data
$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$confirm_password = trim($_POST['confirm_password'] ?? '');

// Validate fields
if (!$fullname || !$email || !$username || !$password || !$confirm_password) {
  echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
  exit;
}

if ($password !== $confirm_password) {
  echo json_encode(['status' => 'error', 'message' => 'Passwords do not match.']);
  exit;
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into database
try {
  $stmt = $pdo->prepare("INSERT INTO users (fullname, email, username, password) VALUES (?, ?, ?, ?)");
  $stmt->execute([$fullname, $email, $username, $hashed_password]);

  echo json_encode(['status' => 'success', 'message' => 'Registration successful!']);
} catch (PDOException $e) {
  echo json_encode(['status' => 'error', 'message' => 'Username or email already exists.']);
}
