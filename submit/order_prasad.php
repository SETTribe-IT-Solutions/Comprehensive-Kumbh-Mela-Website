<?php
require '../include/connect.php';

$name = $_POST['name'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];
$district = $_POST['district'];
$taluka = $_POST['taluka'];
$map = $_POST['map_link'];
$quantity = $_POST['quantity'];
$total = $quantity * 100;

$stmt = $conn->prepare("INSERT INTO prasad_order (devotee_name, address, pincode, district, taluka, map_link, quantity, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssii", $name, $address, $pincode, $district, $taluka, $map, $quantity, $total);
$stmt->execute();

echo "<script>alert('Prasad Order Placed!'); window.location.href='../darshan.php';</script>";
?>
