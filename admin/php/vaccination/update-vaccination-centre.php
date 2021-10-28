<?php

require_once '../db.php';

$id = $_POST["id"];
$centre_id = $_POST["centre_id"];
$name = $_POST["name"];
$location = $_POST["location"];
$vaccine = $_POST["vaccine"];
$slots = $_POST["slots"];

$query = "UPDATE vaccination_centre SET centre_id = '$centre_id', name = '$name', location = '$location', vaccine = '$vaccine', slots = '$slots' WHERE id='$id'";
mysqli_query($connect, $query);

header("Location: ../../pages/vaccination.php");


?>