<?php

require_once '../db.php';

$centre_id = $_POST["centre_id"];
$name = $_POST["name"];
$location = $_POST["location"];
$rooms = $_POST["rooms"];

$query = "INSERT INTO quarantine_centre (centre_id, name, location, rooms)
VALUES ('$centre_id', '$name', '$location', '$rooms')";
mysqli_query($connect, $query);

header("Location: ../../pages/quarantine-centre.php");


?>