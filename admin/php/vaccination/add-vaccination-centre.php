<?php

require_once '../db.php';

$centre_id = $_POST["centre_id"];
$name = $_POST["name"];
$location = $_POST["location"];
$vaccine = $_POST["vaccine"];
$slots = $_POST["slots"];

$query = "INSERT INTO vaccination_centre (centre_id, name, location, vaccine, slots)
VALUES ('$centre_id', '$name', '$location', '$vaccine', '$slots')";
mysqli_query($connect, $query);

header("Location: ../../pages/vaccination.php");


?>