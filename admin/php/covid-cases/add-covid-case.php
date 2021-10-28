<?php

require_once '../db.php';

$date = $_POST["date"];
$tested = $_POST["tested"];
$confirmed = $_POST["confirmed"];
$recovery = $_POST["recovery"];
$death = $_POST["death"];

$query = "INSERT INTO covid_cases (date, tested, confirmed, recovery, death)
VALUES ('$date', '$tested', '$confirmed', '$recovery', '$death')";
mysqli_query($connect, $query);

header("Location: ../../pages/covid-cases.php");


?>