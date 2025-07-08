<?php
require '../include/connect.php';

$pooja = $_POST['pooja_type'];
$lang = $_POST['language'];
$date = $_POST['pooja_date'];

$stmt = $conn->prepare("INSERT INTO epandit_booking (pooja_type, language, pooja_date) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $pooja, $lang, $date);
$stmt->execute();

echo "<script>alert('E-Pandit Booking Done!'); window.location.href='../darshan.php';</script>";
?>
