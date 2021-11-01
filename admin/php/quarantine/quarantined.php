<?php

require_once '../db.php';

$user_id = $_GET["user_id"];
$aadhar_number = $_GET["aadhar"];
$city = $_GET["city"];
$district = $_GET["district"];
$name = $_GET["name"];
$phone = $_GET["phone"];
$age = $_GET["age"];
$quarantine_centre = $_GET["quarantine_centre"];

$query = "INSERT INTO quarantined (user_id, aadhar_number, city, district, name, phone, age, quarantine_centre)
VALUES ('$user_id', '$aadhar_number', '$city', '$district', '$name', '$phone', '$age', '$quarantine_centre')";
mysqli_query($connect, $query);
$query2 = "DELETE FROM quarantine_booking WHERE user_id=$user_id";
mysqli_query($connect, $query2);
$query3 = "DELETE FROM rooms WHERE user_id=$user_id";
mysqli_query($connect, $query3);
header("Location: ../../pages/quarantine-centre.php");

?>