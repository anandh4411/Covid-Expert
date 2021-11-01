<?php

require_once '../db.php';

$user_id = $_GET["user_id"];
$aadhar_number = $_GET["aadhar"];
$city = $_GET["city"];
$district = $_GET["district"];
$name = $_GET["name"];
$phone = $_GET["phone"];
$age = $_GET["age"];
$vaccine = $_GET["vaccine"];

$query = "INSERT INTO vaccinated (user_id, aadhar_number, city, district, name, phone, age, vaccine)
VALUES ('$user_id', '$aadhar_number', '$city', '$district', '$name', '$phone', '$age', '$vaccine')";
mysqli_query($connect, $query);
$query2 = "DELETE FROM vaccine_booking WHERE user_id=$user_id";
mysqli_query($connect, $query2);
$query3 = "DELETE FROM slots WHERE user_id=$user_id";
mysqli_query($connect, $query3);
header("Location: ../../pages/vaccination.php");

?>