<?php

require_once '../db.php';

$booking_id = $_POST["booking_id"];
$user_id = $_POST["user_id"];
$date = $_POST["date"];
$time = $_POST["time"];
$vaccine = $_POST["vaccine"];
$dose = $_POST["dose"];
$centre = $_POST["centre"];

$query = "INSERT INTO slots (booking_id, user_id, date, time, vaccine, dose, centre)
VALUES ('$booking_id', '$user_id', '$date', '$time', '$vaccine', '$dose', '$centre')";
mysqli_query($connect, $query);

$query2 = "UPDATE vaccine_booking SET alloted = 'true' WHERE id=$booking_id";
mysqli_query($connect, $query2);

header("Location: ../../pages/vaccination.php");


?>