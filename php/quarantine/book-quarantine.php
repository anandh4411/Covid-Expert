<?php

require_once '../db.php';

$user_id = $_POST["user_id"];
$aadhar_number = $_POST["aadhar_number"];
$city = $_POST["city"];
$district = $_POST["district"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$age = $_POST["age"];
$quarantine_centre = $_POST["quarantine_centre"];

$query = "INSERT INTO quarantine_booking (user_id, aadhar_number, city, district, name, phone, age, quarantine_centre, alloted)
VALUES ('$user_id', '$aadhar_number', '$city', '$district', '$name', '$phone', '$age', '$quarantine_centre', 'false')";
mysqli_query($connect, $query);
header("Location: ../../pages/quarantine-success.html");

?>