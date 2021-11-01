<?php
$id = $_GET["id"];
require_once '../db.php';
$query = "DELETE FROM quarantine_centre WHERE id = '$id'";
mysqli_query($connect, $query);
header("Location: ../../pages/quarantine-centre.php");
?>