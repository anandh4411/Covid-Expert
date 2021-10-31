<?php

require_once '../db.php';

$user_id = $_POST["user_id"];
$aadhar_number = $_POST["aadhar_number"];
$city = $_POST["city"];
$district = $_POST["district"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$age = $_POST["age"];
$vaccine = $_POST["vaccine"];

$query = "INSERT INTO vaccine_booking (user_id, aadhar_number, city, district, name, phone, age, vaccine, alloted)
VALUES ('$user_id', '$aadhar_number', '$city', '$district', '$name', '$phone', '$age', '$vaccine', 'false')";
mysqli_query($connect, $query);
header("Location: ../../pages/vaccine-success.html");

?>