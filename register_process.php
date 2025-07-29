<?php
header('Content-Type: application/json');
if (ob_get_length()) ob_clean();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'include/connect.php';

// Check DB connection
if (!isset($pdo)) {
  echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
  exit;
}

// Sanitize and fetch form inputs
$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$confirm_password = trim($_POST['confirm_password'] ?? '');

// === Server-side validation ===

// Full Name
if (strlen($fullname) < 3) {
  echo json_encode(['status' => 'error', 'message' => 'Full Name must be at least 3 characters.']);
  exit;
}

// Email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
  exit;
}

// Username
if (!preg_match('/^[a-zA-Z0-9]{6,}$/', $username)) {
  echo json_encode(['status' => 'error', 'message' => 'Username must be at least 6 characters and alphanumeric.']);
  exit;
}

// Password
if (!preg_match('/^[a-zA-Z0-9]{6,}$/', $password)) {
  echo json_encode(['status' => 'error', 'message' => 'Password must be at least 6 characters and alphanumeric.']);
  exit;
}

// Confirm Password
if ($password !== $confirm_password) {
  echo json_encode(['status' => 'error', 'message' => 'Passwords do not match.']);
  exit;
}

// Check for existing email or username
try {
  $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
  $stmt->execute([$email, $username]);
  if ($stmt->fetch()) {
    echo json_encode(['status' => 'error', 'message' => 'Email or Username already exists.']);
    exit;
  }
} catch (PDOException $e) {
  echo json_encode(['status' => 'error', 'message' => 'Error checking existing users.']);
  exit;
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user
try {
  $stmt = $pdo->prepare("INSERT INTO users (fullname, email, username, password) VALUES (?, ?, ?, ?)");
  $stmt->execute([$fullname, $email, $username, $hashed_password]);

  echo json_encode(['status' => 'success', 'message' => 'Registration successful!']);
} catch (PDOException $e) {
  echo json_encode(['status' => 'error', 'message' => 'Server error while registering.']);
}
