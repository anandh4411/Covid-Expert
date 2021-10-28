<?php
$id = $_GET["id"];
require_once '../db.php';
$query = "DELETE FROM vaccination_centre WHERE id = '$id'";
mysqli_query($connect, $query);
header("Location: ../../pages/vaccination.php");
?>