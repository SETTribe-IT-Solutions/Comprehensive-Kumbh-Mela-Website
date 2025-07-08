<?php
require '../include/connect.php';

$ghat = $_POST['ghat'];
$count = $_POST['count'];
$date = $_POST['date'];
$start = $_POST['start_time'];
$end = $_POST['end_time'];

$stmt = $conn->prepare("INSERT INTO snan_booking (ghat_name, devotee_count, snan_date, start_time, end_time) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $ghat, $count, $date, $start, $end);
$stmt->execute();

$snan_id = $stmt->insert_id;

for ($i = 1; $i <= $count; $i++) {
    $name = $_POST["devotee_name_$i"];
    $gotra = $_POST["gotra_$i"];
    $stmt2 = $conn->prepare("INSERT INTO snan_devotees (snan_booking_id, devotee_name, gotra) VALUES (?, ?, ?)");
    $stmt2->bind_param("iss", $snan_id, $name, $gotra);
    $stmt2->execute();
}

echo "<script>alert('Holy Dip Booking Successful!'); window.location.href='../darshan.php';</script>";
?>
