<?php
require '../include/connect.php';

$name = $_POST['name'];
$amount = $_POST['donation'];
$address = $_POST['address'];

$stmt = $conn->prepare("INSERT INTO donation_sankalp (devotee_name, donation_amount, address) VALUES (?, ?, ?)");
$stmt->bind_param("sds", $name, $amount, $address);
$stmt->execute();

echo "<script>alert('Thank you for your donation!'); window.location.href='../darshan.php';</script>";
?>

