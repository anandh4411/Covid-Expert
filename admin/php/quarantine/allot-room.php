<?php

require_once '../db.php';

$booking_id = $_POST["booking_id"];
$user_id = $_POST["user_id"];
$date = $_POST["date"];
$room = $_POST["room"];
$centre = $_POST["centre"];

$query = "INSERT INTO rooms (booking_id, user_id, date, room, centre)
VALUES ('$booking_id', '$user_id', '$date', '$room', '$centre')";
mysqli_query($connect, $query);

$query2 = "UPDATE quarantine_booking SET alloted = 'true' WHERE id=$booking_id";
mysqli_query($connect, $query2);

header("Location: ../../pages/quarantine-centre.php");


?>