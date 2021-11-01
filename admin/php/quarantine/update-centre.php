<?php

require_once '../db.php';

$id = $_POST["id"];
$centre_id = $_POST["centre_id"];
$name = $_POST["name"];
$location = $_POST["location"];
$rooms = $_POST["rooms"];

$query = "UPDATE quarantine_centre SET centre_id = '$centre_id', name = '$name', location = '$location', rooms = '$rooms' WHERE id='$id'";
mysqli_query($connect, $query);

header("Location: ../../pages/quarantine-centre.php");


?>